<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php
    /**
     * @var array $rocniky
     * @var array $kategorie
     */
?>
<div class="container mt-4">
<h1>Přidat závod</h1>
<a href="<?= site_url('/') ?>" class="btn btn-dark mb-3">Zpět</a>

<div class="row">
    <form action="<?= base_url('form-alert/country/create') ?>" method="post">
        <div class="col-md-10">
            <?php
            $atributyRaceName = [
                'class' => 'form-control',
                'id'    => 'race_name',
                'placeholder' => 'Enter name of race'
            ];

            $atributyZacatek = [
                'class' => 'date',
                'id'    => 'start_date',
                'placeholder' => 'Zadejte začátek závodu'
            ];

            $atributyKonec = [
                'class' => 'date',
                'id'    => 'start_date',
                'placeholder' => 'Zadejte začátek závodu'
            ];

            ?>

            <?= form_dropdown_bs("year", $rocniky, [], 'mb-3', "Ročník závodu") ?>

            <?=  form_input_bs("race_name", $atributyRaceName, "Název závodu") ?>

            <?= form_input_bs("start_date", $atributyZacatek, "Datum startu závodu", "date") ?>

            <?= form_input_bs("end_date", $atributyKonec, "Datum konce závodu", "date") ?>

            <?= form_dropdown_bs("categories", $kategorie, [], 'mb-3', "Kategorie Závodů") ?>

            <?= form_input_bs("logo", [], "Logo závodu", "file") ?>

            <button type="submit" class="btn btn-dark">Send</button>
            
        </div>
        
    </form>
</div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    tinymce.init({
        license_key: 'gpl',
        promotion: false,
        selector: 'textarea#description',
        height: 500,
        entity_encoding: 'raw',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount',
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic underline backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
</script>

<?= $this->endSection() ?>