<?php
                                            if(isset($kompetensi) && $kompetensi!=null)
                                            {
                                                 echo   '<p>';
                                                 echo   '    <label for="kompetensi">Kompetensi</label>';
                                                 echo   '    <select name="kompetensi_id" id="kompetensi_id" >';
                                                 echo   '        <option value="">Pilih Salah satu</option>';
                                                            foreach($kompetensi as $row)
                                                             {
                                                                    echo   ' <option value="'.$row->kompetensi_id.'">'.$row->kompetensi_nama.'</option>';
                                                             }
                                                 echo   '    </select>';
                                                 echo   '</p>';

                                                echo '<p class="clearboth">';
                                                echo '<input class="button" name="submit" type="submit" value="Submit"/>';
                                                echo '</p>';
                                            }
                                        ?>

                                        
