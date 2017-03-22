	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                <div class= "col-md-1"></div>
	                    <div class="col-md-10">
	                        <div class="card">
	                            <div class="card-header" data-background-color="purple">
	                                <h4 class="title">Enregistrer un nouvel administrateur</h4>
	                            </div>
	                            <div class="card-content">
	                                <form action="./dashboard.php" method="POST">
	                                <label><?php if(isset($message)) echo $message ?></label>
	                                    <div class="row">
	                                   		<div class="col-md-4"></div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Nom</label>
													<input type="text" class="form-control" name="nom" required="required">
												</div>
											</div>
											<div class="col-md-4"></div>											
	                                   	</div>
	                                    
	                                    <div class="row">
	                                   		<div class="col-md-4"></div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Prenom</label>
													<input type="text" class="form-control" name="prenom" required="required">
												</div>
											</div>
											<div class="col-md-4"></div>											
	                                   	</div>
	                                    <div class="row">
	                                   		<div class="col-md-4"></div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email</label>
													<input type="text" class="form-control" name="email" required="required">
												</div>
											</div>
											<div class="col-md-4"></div>											
	                                   	</div>
	                                    <div class="row">
	                                   		<div class="col-md-4"></div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Mot de passe</label>
													<input type="password" class="form-control" name="mdp" required="required">
												</div>
											</div>
											<div class="col-md-4"></div>											
	                                   	</div>	 
	                                   <div class="row">
	                                   		<div class="col-md-4"></div>
	                                        <div class="col-md-4">
	                                   			<label><?php if(isset($message2)) { echo $message2; } ?></label>							
											</div>
											<div class="col-md-4"></div>											
	                                   	</div>          
                                  
										<div class="row">
										
	                                   		<div class="col-md-4"></div>
	                                        <div class="col-md-4">
	                                        
												<div class="form-group label-floating">
													<label class="control-label">Confirmation mot de passe</label>
													<input type="password" class="form-control" name="mdp2" required="required">

												</div>
											</div>
											<div class="col-md-4"></div>											
	                                   	</div>	                            	                                    	
	                                    <button type="submit" class="btn btn-primary pull-right">Nouveau</button>
										<input type="hidden" name="action" value="addAdmin"/>

	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>