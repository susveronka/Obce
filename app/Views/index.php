<?php
    $this -> extend('layout/layout.php');
    $this -> section('content'); 
?>
<?php
$table = new \CodeIgniter\View\Table();
?>
<?php 
$table->setHeading('Poradi', 'Název', 'Pocet adresnich mist');
foreach ($obec as $key => $row) {
    $table->addRow(($pager->getCurrentPage()-1)*20+$key+1,$row['nazev'], $row['pocet']);
}
$template = array(
    'table_open'=> '<table class="table table-bordered">',
    'thead_open'=> '<thead class="thead-dark">',
    'thead_close'=> '</thead>',
    'heading_row_start'=> '<tr class="bg-primary">',
    'heading_row_end'=>' </tr>',
    'heading_cell_start'=> '<th class="text-center">',
    'heading_cell_end' => '</th>',
    'tbody_open' => '<tbody>',
    'tbody_close' => '</tbody>',
    'row_start' => '<tr>',
    'row_end'  => '</tr>',
    'cell_start' => '<td>',
    'cell_end' => '</td>',
    'row_alt_start' => '<tr>',
    'row_alt_end' => '</tr>',
    'cell_alt_start' => '<td>',
    'cell_alt_end' => '</td>',
    'table_close' => '</table>'
    );
    
    $table->setTemplate($template);
echo $table->generate();
echo $pager->links();
?>
<?php $this -> endsection() ?>