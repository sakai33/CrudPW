            
 
            <hr>   
        </main> <!-- /container -->

        <footer class="container">
            <!-- inclui as linhas abaixo para melhorar o visual do footer -->
             <?php $dt = new DAteTime("now", new DateTimeZone("America/Sao_Paulo")); //Padrão do Unix o TimeZone ?>
            <p>&copy;2026 à <?php echo $dt->format("Y") // O Y é só para o ano atual?> - Luccas e Maria Sakai</p>
        </footer>

        <!--  troca esses aqui para os abaixo: script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script -->
        <!-- script>window.jQuery || document.write('<script srcjs/jquery-1.11.2.min.js"><\/script>')</script -->

        <script src="<?php echo BASEURL; ?>js/jquery-4.0.0.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/all.min.js"></script>
        <script src="<?php echo BASEURL; ?>js/bootstrap.bundle.min.js"></script>
        
        <script src="<?php echo BASEURL; ?>js/main.js"></script> <!-- vai ser incluído no desenvolvimento que usará o jquery -->
    </body>
</html>