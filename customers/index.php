
       <?php
       include '../header.php';
       echo $header_html;
       $sql = "SELECT * FROM customers";
       $result = mysqli_query($con, $sql);

       echo getenv("PHP_PRUEBA_ENV");
        ?>

        <div class="container-fluid p-5 bg-primary text-white text-center">
          <h1>Lista de Clientes</h1>
          <p>En esta lista se muestran todos los clientes registrados en la plataforma</p>
        </div>

        <?php
         if(isset($_SESSION["alert"]))
          {
            echo '<div class="container mt-5">
              <div class="row">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-8">
                  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>'
                    .$_SESSION["alert"].'
                </div>
                </div>
            </div>';
            unset($_SESSION["alert"]);
        }

        ?>
        <div class="container mt-5">
          <div class="row">
            <div class="col-sm-2"><a href="../index.php">Volver</a></div>
            <div class="col-sm-8">
              <h3>Clientes</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">&nbsp;</div>
            <div class="col-sm-8">
              <table class="table">
                <thead>
                  <tr>
                    <td>CustomerID</td>
                    <td>CompanyName</td>
                    <td>City</td>
                    <td><a href="new.php">Nuevo Cliente</a></td>
                  </tr>
                </thead>
              <tbody>
                <?php
                if($result){
                while($row = mysqli_fetch_array($result)){
                echo '<tr>';
                  echo '<td>';
                    echo $row['CustomerID'];
                  echo '</td>';
                  echo '<td>';
                    echo $row['CompanyName'];
                  echo '</td>';
                  echo '<td>';
                    echo $row['City'];
                  echo '</td>';
                  echo '<td>';
                    echo '<a href="show.php?id='.$row['CustomerID'].'">Ver</a>&nbsp;&nbsp;';
                    echo '<a href="#">Editar</a>&nbsp;&nbsp;';
                    echo '<a href="delete.php?id='.$row['CustomerID'].'">Eliminar</a>&nbsp;';
                    echo '<a href="add_to_cart.php?id='.$row['CustomerID'].'">Añadir</a>';
                  echo '</td>';
                echo '</tr>';
                }
              }
              mysqli_close($con);
                ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>

        <?php echo $footer_html; ?>
