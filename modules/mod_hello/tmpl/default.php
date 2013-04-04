<?php // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<table border="1">
    <tr>
        <th> Job ID</th>
        <th>Job Title</th>
        <th>Job Company</th>
        <th>DeadLine</th>
    </tr>
<?php 
foreach($rows as $row){?>
    <tr>
        <td><?php echo $row->jobs_id;?></td>
        <td><?php echo $row->jobs_title;?></td>
        <td><?php echo $row->jobs_company;?></td>
        <td><?php echo $row->jobs_deadline;?></td>
    </tr>
    <?php 
} 
?>
</table>
