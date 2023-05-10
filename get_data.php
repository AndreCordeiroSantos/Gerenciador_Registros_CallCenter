
    <?php
    // Conecta ao banco de dados
    $conn = new PDO('mysql:host=172.10.20.53;dbname=ocsweb', 'andre', 'somores013');

    if (isset($_POST['name'])) {
        $name = $_POST['name'];

        $sql = "SELECT 
        ocsweb.software_publisher.PUBLISHER,
        ocsweb.software_name.NAME,
        ocsweb.software_version.VERSION
        FROM ocsweb.software
        INNER JOIN ocsweb.software_publisher ON ocsweb.software.PUBLISHER_ID = ocsweb.software_publisher.ID
        INNER JOIN ocsweb.hardware ON ocsweb.software.HARDWARE_ID = ocsweb.hardware.ID
        INNER JOIN ocsweb.software_name ON ocsweb.software.NAME_ID = ocsweb.software_name.ID
        INNER JOIN ocsweb.software_version ON ocsweb.software.VERSION_ID = ocsweb.software_version.ID
        JOIN accountinfo ON hardware.id = accountinfo.hardware_id
        WHERE (software.PUBLISHER_ID OR software.VERSION_ID)
        AND ocsweb.hardware.name = :name";

        // Prepara e executa a consulta
        $stmt = $conn->prepare($sql);
        $stmt->execute([':name' => $name]);
        $result = $stmt->fetchAll();

        // Verifique se a consulta foi bem-sucedida
        if ($result) {
            echo "<h5 style='text-align: center'>";
            echo "$name";
            echo "</h5>";
            echo "<br>";
            // Exiba os resultados da consulta em uma tabela
            echo "<table id='myTable' class='display'>";
            echo "<thead><tr><th>Empresa</th><th>Software</th><th>Versão</th></tr></thead>";
            echo "<tbody>";

            foreach ($result as $row) {
                echo "<tr><td>" . $row["PUBLISHER"] . "</td>";
                echo "<td>" . $row["NAME"] . "</td>";
                echo "<td>" . $row["VERSION"] . "</td></tr>";
            }

            echo "</tbody></table>";


            // Inicializa a tabela com DataTables
            echo "<script type='text/javascript'>
                    $(document).ready(function() {
                        $('#myTable').DataTable({
                            // Adicione a opção de idioma
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
                            },
                            'pageLength': 10,
                            'lengthMenu': [10, 30, 50, 100],
                        });
                    });
                </script>";
        } else {
            // Exiba uma mensagem de erro
            echo "Erro ao executar a consulta.";
        }
    }
    
    ?>
