<?php 
include 'template-parts/header.php'; 
include '../backend/controller.php';

$controller = new Controller();
$contact_list = $controller->contact_list_controller();
?>
<div class="container contact-body">
    <h2 class="text-center">REGISTER</h2>
    <div class="adjust-table p-2 mt-5">
        <div class="table-responsive">
            <table id="contact-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Unit Size</th>
                        <th>Contact Source</th>
                        <th>Price Range</th>
                        <th>Broker</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($contact_list as $data){
                ?>
                    <tr id='data-<?php echo $data['id']; ?>'>
                        <td><?php echo $data['first_name'].' '.$data['last_name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['phone_number']; ?></td>
                        <td><?php echo $data['city']; ?></td>
                        <td><?php echo $data['postal_code']; ?></td>
                        <td><?php echo $data['unit_size']; ?></td>
                        <td><?php echo $data['contact_source']; ?></td>
                        <td><?php echo $data['price_range']; ?></td>
                        <td><?php echo $data['is_broker']; ?></td>
                        <td><?php echo $data['created_date']; ?></td>
                        <td class="text-center"><i class='fas fa-trash delete-rec' name="delete" data-id="<?php echo $data['id']; ?>"></i></td>
                    </tr>
                <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'template-parts/footer.php'; ?>
