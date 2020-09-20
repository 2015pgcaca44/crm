@php
$d_id = $_POST['id'];

$sql = $db->query("SELECT * from `members_list` WHERE `id` = '$d_id'");
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $output)
{
	$id = $output['id'];
	$m_name = $output['m_name'];
	$profession = $output['profession'];
	$company_name = $output['company_name'];
	$email_id = $output['email_id'];
	$phone1 = $output['phone1'];
	$phone2 = $output['phone2'];
	$category = $output['category'];
	$fname = $output['fname'];
	$lname = $output['lname'];
}
@endphp
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="name" class="col-md-4 control-label">Name</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

	                                @if ($errors->has('email'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                            <label for="password" class="col-md-4 control-label">Password</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control" name="password" required>

	                                @if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

	                            <div class="col-md-6">
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	                            </div>
	                        </div>