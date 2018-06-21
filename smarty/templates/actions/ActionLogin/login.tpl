{include file="../../header.tpl"}

<div class="row">
	<div class="col-md-12">
		<h1>Login page</h1>
		{if $bIsAuthorized}
			<p class="simple-text">User already authorized</p>
		{else}
			<form method="POST" id="form_submit_login" class="form-horizontal">
				<div class="form-group">
					<label for="inputLogin" class="col-md-2 control-label">Login</label>
					<div class="col-md-4">
					  <input type="text" class="form-control" id="inputLogin" name="login">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-md-2 control-label">Password</label>
					<div class="col-md-4">
					  <input type="password" class="form-control" id="inputPassword" name="password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
					  <button type="submit" class="btn" name="submit_login" value="Sign in">Sign in</button>
					</div>
				</div>
			</form>
		{/if}
	</div>
</div>


{include file="../../footer.tpl"}