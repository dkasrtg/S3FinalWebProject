<div class="page-header">
                        <h2 class="header-title"> Les historiques </h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="checkbox">
                                                    <input id="checkAll" type="checkbox">
                                                    <label for="checkAll" class="m-b-0"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Proprietaire</th>
                                            <th>Derniere Date de Propriete</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for ($i=0; $i < count($data); $i++) { 
                                            ?>
                                                <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #<?php echo $data[$i]['idObjet']?>
                                            </td>
                                            <td>
                                                <?php echo $data[$i]['nom']." ".$data[$i]['prenom']?>
                                            </td>
                                            <td>
                                                <?php echo $data[$i]['derniereDate']?> 
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>