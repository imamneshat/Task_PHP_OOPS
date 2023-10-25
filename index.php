<?php 
	include_once 'classes/UserAndData.class.php';
  	$UserAndData = new UserAndData();
	include_once'includes/header/header.php'; 

?>
<div class="float-right">
    <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" 
    data-target="#modalUserAdd"><i class="plus"></i> New User</a>
</div>
<div class="statusMsg"></div>
<!-- List the users -->
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Date Of Birth</th>
            <th>Sex</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="userData">
        <?php 
        	$totalData = $UserAndData->totalData();

            foreach ($totalData->fetchAll() as $row)
            {
        		echo "
        		<tr>
            		<td>{$row['u_id']}</td>
	                <td>{$row['u_name']}</td>
	                <td>{$row['u_email']}</td>
	                <td>{$row['u_mobile']}</td>
	                <td>{$row['u_dob']}</td>
	                <td>{$row['u_sex']}</td>
	                <td>
                		<a href=\"index.php?user_edit_id={$row['u_id']}\" class=\"btn btn-warning\" rowID=\"{$row['u_id']}\" data-type=\"edit\" data-toggle=\"modal\" data-target=\"#modalUserEdit\">edit</a>
                		<a href=\"index.php?user_id={$row['u_id']}\" class=\"btn btn-danger\" onclick=\"return confirm('Are you sure to delete data?')?userAction('delete', 'index.php?user_id={$row['u_id']}'):false;\">delete</a>
            		</td>
        		</tr>
        		<tr><td colspan=\"7\">No user(s) found...</td></tr>";
    		}
		?>
    </tbody>
</table>
<!-- Modal Add Form -->
<div class="modal fade" id="modalUserAdd" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add New User</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            	<!-- Modal Body -->
            	<div class="modal-body">
                	<div class="statusMsg"></div>
                    	<div class="form-group">
                        	<label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="sex">sex</label>
                        <input type="text" class="form-control" name="sex" id="sex" placeholder="Gender">
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id"/>
            	</div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <input type="submit" class="btn btn-success" name="submit" id="userSubmit" value="Submit">
	            </div>
            </form>
            <!-- Modal Footer -->
        </div>
    </div>
</div>


<!-- Modal Edit Form -->
<div class="modal fade" id="modalUserEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            	<!-- Modal Body -->
            	<?php
            	  	if (isset($_REQUEST['user_edit_id'])) 
            	  	{
            	    	$user_edit_id = $_REQUEST['user_edit_id'];
            	    	$edit_data = $UserAndData->mangeData($user_edit_id);

            	    	foreach ($edit_data->fetchAll() as $row)
            	    	{	
            	    		 // echo $edit_data;
                	      	echo"
			            	<div class=\"modal-body\">
			                	<div class=\"statusMsg\"></div>
		                    	<div class=\"form-group\">
		                        	<label for=\"name\">Name</label>
		                        	<input type=\"text\" class=\"form-control\" name=\"name\" id=\"name\" 
		                        	value=\"{$row['u_name']}\" placeholder=\"Enter your name\">
			                    </div>
			                    <div class=\"form-group\">
			                        <label for=\"email\">Email</label>
			                        <input type=\"email\" class=\"form-control\" name=\"email\" id=\"email\" 
			                        value=\"{$row['u_email']}\" placeholder=\"Enter your email\">
			                    </div>
			                    <div class=\"form-group\">
			                        <label for=\"phone\">Phone</label>
			                        <input type=\"text\" class=\"form-control\" name=\"phone\" id=\"phone\" 
			                        value=\"{$row['u_mobile']}\" placeholder=\"Enter phone no\">
			                    </div>
			                    <div class=\"form-group\">
			                        <label for=\"dob\">Date Of Birth</label>
			                        <input type=\"date\" class=\"form-control\" name=\"dob\" id=\"dob\" 
			                        value=\"{$row['u_dob']}\" placeholder=\"Enter Date of Birth\">
			                    </div>
			                    <div class=\"form-group\">
			                        <label for=\"sex\">sex</label>
			                        <input type=\"text\" class=\"form-control\" name=\"sex\" id=\"sex\" 
			                        value=\"{$row['u_sex']}\" placeholder=\"Gender\">
			                    </div>
			                    <input type=\"hidden\" class=\"form-control\" value=\"$user_edit_id\" name=\"id\" id=\"id\"/>
		            		</div>
		            		<div class=\"modal-footer\">
	                			<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
	                			<input type=\"submit\" class=\"btn btn-success\" name=\"submitEdit\" id=\"userSubmit\" 
	                			value=\"Submit\">
        					</div>";
            			}
        			}
        		?>
            </form>
            <!-- Modal Footer -->
        </div>
    </div>
</div>
<?php
	include_once'includes/footer/footer.php';

	if(isset($_POST['submit'])) 
  	{

	    $name = $_POST['name'];
	    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
	    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
	    $mobile = !empty($_POST['phone']) ? trim($_POST['phone']) : null;
	    $dob = !empty($_POST['dob']) ? trim($_POST['dob']) : null;
	    $sex = !empty($_POST['sex']) ? trim($_POST['sex']) : null;

	    $name = $UserAndData->cleanData($name);
	    $email = $UserAndData->cleanData($email);
	    $mobile = $UserAndData->cleanData($mobile);
	    $dob = $UserAndData->cleanData($dob);
	    $sex = $UserAndData->cleanData($sex);

	    $userRegistration = $UserAndData->userRegistration($name, $email, $mobile, $dob, $sex);

	}

	if (isset($_REQUEST['user_id'])) 
	{
		$user_id = $_REQUEST['user_id'];
        $userDelete = $UserAndData->dataDelete($user_id);
          // echo $userDelete;
          echo '<script type="text/javascript">';
          echo 'alert("Customer Delete Succesfully");';
          echo 'window.location.href = "index.php";';
          echo '</script>';
	}

	if(isset($_POST['submitEdit'])) 
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['phone'];
		$dob = $_POST['dob'];
		$sex = $_POST['sex'];
		  
		$name = !empty($_POST['name']) ? trim($_POST['name']) : null;
		$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
		$mobile = !empty($_POST['phone']) ? trim($_POST['phone']) : null;
		$dob = !empty($_POST['dob']) ? trim($_POST['dob']) : null;
		$sex = !empty($_POST['sex']) ? trim($_POST['sex']) : null;

		$name = $UserAndData->cleanData($name);
		$email = $UserAndData->cleanData($email);
		$mobile = $UserAndData->cleanData($mobile);
		$dob = $UserAndData->cleanData($dob);
		$sex = $UserAndData->cleanData($sex);

		$userUpdate = $UserAndData->dataUpdate($user_edit_id, $name, $email, $mobile, $dob, $sex);
	}
?>
