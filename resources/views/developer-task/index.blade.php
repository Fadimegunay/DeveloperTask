<link rel="stylesheet" href="http://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
 
<div class="col-md-12">

    <div class="row">
        <div class="col-md-12">
            <table id="table" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Developer</th>
                        <th>Görev</th>
                        <th>Hafta</th>
                    </tr>
                </thead>
                <tbody>     
                    @foreach($developerTasks as $developerTask) 
                    <tr>
                        <td>{{ $developerTask->developer->developer }}</td>
                        <td>{{ $developerTask->task->task }}</td>
                        <td>{{ $developerTask->week }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable( {
            "order": [[ 2, "asc" ]]
        } );
    } );
</script>