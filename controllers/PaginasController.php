<?php

namespace Controllers;

use MVC\Router;
use Model\Ciudad;
use Model\Cliente;
use Model\Compromiso;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $ciudades = Ciudad::all();
        $clientes = Cliente::all();
        $compromisos = Compromiso::all();
        $total = Ciudad::total();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mensaje = null;
            $respuestas = $_POST['contacto'];

            // Crear una instancia para PHPMailer
            $mail = new PHPMailer();

            // Configurar el SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $_ENV['EMAIL_PORT'];

            // Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com', 'bienesraicesjordy.site');
            $mail->addAddress($respuestas['email'], $respuestas['nombre'] . ' ' . $respuestas['apellido']);
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' ' . $respuestas['apellido'] . '</p>';
            $contenido .= '<p>Celular: ' . $respuestas['celular'] . '</p>';
            $contenido .= '<p>Correo: ' . $respuestas['email'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Ciudad: ' . $respuestas['ciudad'] . ', ' . $respuestas['estado'] . '</p>';
            $contenido .= '<p>Presupuesto: $' . $respuestas['presupuesto'] . '</p>';
            $contenido .= '</html>';

            // debuguear($contenido);

            $mail->Body = $contenido;

            // Enviar en email
            if ($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "Mensaje no enviado ó falto datos";
            }
        }

        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'ciudades' => $ciudades,
            'clientes' => $clientes,
            'mensaje' => $mensaje,
            'total' => $total,
            'compromisos' => $compromisos
        ]);
    }

    public static function hogares(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/hogares/hogares', [
            'titulo' => 'Venta de Hogares',
            'propiedades' => $propiedades
        ]);
    }

    public static function contacto(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mensaje = null;
            $respuestas = $_POST['contacto'];

            // Crear una instancia para PHPMailer
            $mail = new PHPMailer();

            // Configurar el SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $_ENV['EMAIL_PORT'];

            // Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com', 'bienesraicesjordy.site');
            $mail->addAddress($respuestas['email'], $respuestas['nombre'] . ' ' . $respuestas['apellido']);
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' ' . $respuestas['apellido'] . '</p>';
            $contenido .= '<p>Celular: ' . $respuestas['celular'] . '</p>';
            $contenido .= '<p>Correo: ' . $respuestas['email'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Ciudad: ' . $respuestas['ciudad'] . ', ' . $respuestas['estado'] . '</p>';
            $contenido .= '<p>Presupuesto: $' . $respuestas['presupuesto'] . '</p>';
            $contenido .= '</html>';

            // debuguear($contenido);

            $mail->Body = $contenido;

            // Enviar en email
            if ($mail->send()) {
                $mensaje = "Mensaje enviado";
            } else {
                $mensaje = "Mensaje no enviado";
            }
        }

        $router->render('paginas/contacto/contacto', [
            'titulo' => 'Contacto',
            'mensaje'=>$mensaje
        ]);
    }

    public static function error(Router $router) {
        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }
}