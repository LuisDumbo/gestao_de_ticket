<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <table id="desp" class="cell-border row-border compact nowrap" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
            <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr>
        </tbody>
    </table>

    <h2>Margim teste</h2>
    <tale>
        <thead>
            <th>
                
            </th>
            <th></th>
        </thead>
    </tale>


    <script>
        $(document).ready(function() {
            $('#desp').DataTable({
                "info": false,
                "order": [
                    [0, "desc"]
                ],
                dom: 'Bfrtip',
               
                responsive: true,
                "language": {
                    "lengthMenu": "Ver _MENU_ resultados",
                    "zeroRecords": "0 Resultados encontrados",
                    "info": "Ver página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sem resultados",
                    "search": "Procurar:",
                    "paginate": {
                        "first": "Primeiro",
                        "last": "Último",
                        "next": "Próximo",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>

</body>

</html>