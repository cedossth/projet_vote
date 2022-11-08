<div class="container">
    <div class="panel panel-success margetop60">
		<div class="panel-heading">Liste des lieu</div>
	</div>
    <div class="panel panel-info">
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>LIEU</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($lieu=mysqli_fetch_array($resultatC, MYSQLI_ASSOC)){ ?>
                        <tr>
                            <td><?php echo $lieu['idLieu'] ?> </td>
                            <td><?php echo $lieu['nomL'] ?> </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>