<!DOCTYPE html>
<div id="id_desactivarTx_BD">

    <div class="row">
        <div class="col-lg-4"></div>

        <div class="col-lg-2">

            <form action="habilitar.php" method="POST">

                <input type="hidden" name ="habilitador" id ="habilitador" value="1">
                <button type="submit" class="btn btn-primary" name ="enviar">Habilitar recepción datos</button>
            </form>
        </div>

        <div class="col-lg-2">

            <form action="habilitar.php" method="POST">

                <input type="hidden" name ="deshabilitador" id ="deshabilitador" value="0">
                <button type="submit" class="btn btn-warning" name ="send">Inhabilitar recepción datos</button>
            </form>
        </div>
    </div>

</div>
</html>