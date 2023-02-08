<div class="page-header">
                        <h2 class="header-title">Propositions recus</h2>
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
                                            <th>Proposeur</th>
                                            <th>Objet propose</th>
                                            <th>Prix objet propose</th>
                                            <th>A echanger contre ma/mon</th>
                                            <th>D une valeur de</th>
                                            <th>Date</th>
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
                                                #<?php echo $data[$i]['idProposition']?>
                                            </td>
                                            <td>
                                                <?php echo $data[$i]['nomProposeur']." ".$data[$i]['prenomProposeur']?>
                                            </td>
                                            <td>
                                            <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="<?php bu('assets/images/'.$data[$i]['ObjetProposeurPhotos'][0])?>" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"><?php echo $data[$i]['ObjetProposeurTitre']?></h6>
                                                </div>
                                            </td>
                                            <td>Ar <?php echo $data[$i]['ObjetProposeurPrixEstimatif']?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="<?php bu('assets/images/'.$data[$i]['ObjetProposerPhotos'][0])?>" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"><?php echo $data[$i]['ObjetProposerTitre']; ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                Ar <?php echo $data[$i]['ObjetProposerPrixEstimatif']?> 
                                            </td>
                                            <td><?php echo $data[$i]['dateProposition']?></td>
                                            <td class="text-right">
                                                <a href="<?php su('Frontechange/acceptation/'.$data[$i]['idProposition'].'/'.$data[$i]['idObjetProposer'].'/'.$data[$i]['idObjetAProposer'].'/'.$data[$i]['idProposeur']); ?>">Accepter</a>
                                            </td>
                                            <td>
                                                <a href="<?php su('Frontechange/refus/'.$data[$i]['idProposition']); ?>">Refuser</a>
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