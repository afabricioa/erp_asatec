<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
   
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    

</head>
<body>


    <div class="container mb-5 mt-3">
        <table class="table table-striped table-bordered mydatatable">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Salário</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nelma Layelle</td>
                    <td>11111111</td>
                    <td>fortaleza</td>
                    <td>5000</td>
                </tr>
                <tr>
                    <td>Antonio Fabricio</td>
                    <td>121212121</td>
                    <td>Fortaleza</td>
                    <td>5000</td>
                </tr>
            </tbody>
        </table>
    </div>
    

    <script>
        $('.mydatatable').DataTable();
    </script>

    
</body>
</html>
