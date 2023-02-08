<div class="card">
                        <div class="card-body">
                            
                            <h4>Insert Category</h4>
                            
                            <div class="m-t-25" style="max-width: 700px">
                                <form action="<?php su('back/insert_category')?>" method="get">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Nom de la categorie</label>
                                            <input type="text" name="txt" class="form-control" id="inputCity">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                        <?php if(isset($_GET['message'])) { ?>
                                <h4 style="color:red;"> Insertion Reussi </h4>
                            <?php } ?>
                            <?php if(isset($_GET['erreur'])) { ?>
                                <h4 style="color:red;">Nom Invalide</h4>
                            <?php } ?>
                    </div>