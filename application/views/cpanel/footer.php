</section>
</div>


</div>
</div>
<!-- jQuery -->
<script src="../public/vendor/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../public/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../public/plugins/scripts/js/scriptEngine.js"></script>
<?php
$html=new HTML();
echo $html->includeJs('../public/customJs/'. $this->_controller.'s' .'.js');

?>
</body>

</html>