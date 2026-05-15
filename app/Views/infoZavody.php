<?=$this->extend("layout/template");?>

<?=$this->section("content");?>
<div class="container mt-4">
    <h3 class="text-center">Závody</h3>
    
    <?php
        $table = new \CodeIgniter\View\Table();

        $table->setHeading("Rok", "Název závodu", "Datum", "Logo", "Země");
        $logo = '<img src="'.base_url("obrazky/loga/".$row->logo).'" class="img-fluid">';
?>
 <?php         foreach($infoRace as $row) {
            

            $table->addRow(
                $row->year, 
                $row->real_name, 
                $row->start_date, 
                $logo
            );
        }


        $table->setTemplate(['table_open' => '<table class="table table-bordered">']);
        ?>
        echo $table->generate();
    ?>
</div>
<?= $this->endSection(); ?>