<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/LIB/vendor/autoload.php';



use Dompdf\Dompdf;

class GenerarPDF {
    private $conexion;

    public function __construct() {
        // Conexión a la base de datos
        $this->conexion = new mysqli("localhost", "root", "", "main");

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    private function obtenerDatos() {
        $sql = "SELECT id, Nombre, Apellidos, Correo, Tipo  FROM usuarios_admin";
        $resultado = $this->conexion->query($sql);

        $datos = [];
        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }
        }
        return $datos;
    }

    public function crearPDF() {
        $rows = $this->obtenerDatos();
        $html = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Documentos</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 14px;
                }
                caption {
                    font-weight: bold;
                    font-size: 16px;
                    margin-bottom: 12px;
                    text-align: left;
                    color: #333;
                }
                thead th {
                    background-color: #c62828;
                    color: #fff;
                    padding: 10px;
                    text-align: center;
                    border: 1px solid #b71c1c;
                }
                tbody td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }
                tbody tr:nth-child(even) {
                    background-color: #f9f9f9;
                }
                tbody tr:hover {
                    background-color: #ffe5e5;
                }
                .table-responsive {
                    overflow-x: auto;
                    margin-top: 15px;
                }
            </style>
        </head>
        <body>
            <div class="table-responsive">
                <table>
                  <caption>Documentos registrados</caption>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Correo</th>
                      <th>Tipo</th>
                    </tr>
                  </thead>
                <tbody>';

        if (empty($rows)) {
            $html .= '<tr><td colspan="8">No hay registros.</td></tr>';
        } else {
            foreach ($rows as $r) {
                $html .= '<tr>
                    <td>' . (int)$r['id'] . '</td>
                    <td>' . htmlspecialchars($r['Nombre'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($r['Apellidos'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($r['Correo'], ENT_QUOTES, 'UTF-8') . '</td>
                    <td>' . htmlspecialchars($r['Tipo'], ENT_QUOTES, 'UTF-8') . '</td>
                </tr>';
            }
        }
        $html .= '
                  </tbody>
                </table>
            </div>
        </body>
        </html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("TablaUsuarios.pdf", ["Attachment" => false]);
    }
}
$pdf = new GenerarPDF();
$pdf->crearPDF();
