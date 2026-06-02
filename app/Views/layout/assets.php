<!-- 1. CSS STYLY -->
<link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?= base_url('node_modules/flag-icons/css/flag-icons.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('node_modules/select2/dist/css/select2.min.css') ?>">

<!-- 2. JAVASCRIPT SKRIPTY -->
<!-- jQuery MUSÍ být první, jinak Select2 vyhodí chybu -->
<script src="<?= base_url("node_modules/jquery/dist/jquery.min.js") ?>"></script>
<!-- Select2 JS následuje hned po jQuery -->
<script src="<?= base_url("node_modules/select2/dist/js/select2.min.js") ?>"></script>
<!-- OPRAVA: Změněno z <link> na <script>, protože TinyMCE je JavaScript -->
<script src="<?= base_url('node_modules/tinymce/tinymce.min.js') ?>"></script>
