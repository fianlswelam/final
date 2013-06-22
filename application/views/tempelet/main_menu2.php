
                      
                        <ul class="nav nav-tabs nav-stacked" style="width:15%">
                            <li><a href="" style="text-align:center"> الاعضاء <i class="icon-user"></i></a></li>
                            <?php if(isset($contacts)){ foreach($contacts as $contact){?>
                                    <li><a href="<?php echo base_url();?>/user/show_messages/<?php echo $contact->id?>"><?php echo $contact->username;?> <i class="icon-user"></i></a></li>
                                    
                                  <?php }}else{ ?>
								   <li><a href="#">لا يوجد اعضاء ف شجرتك حتي الان</i></a></li>
								  <?php }?>
                                  

                        </ul>