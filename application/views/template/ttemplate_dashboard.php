</div><!-- end jquery_tab -->
                                <div class="jquery_tab">

                                <div class="content_block">
                                    <h2 class="jquery_tab_title">Input fields</h2>
                                    <form method="post" action="#tab2">
                                        <p>
                                            <label for="name">Name (small input field)</label>
                                            <input class="input-small" type="text" value="" name="name" id="name"/>
                                        </p>

                                        <p>
                                            <label for="mail">E-Mail address (medium sized input field)</label>
                                            <input class="input-medium" type="text" value="" name="mail" id="mail"/>
                                        </p>

                                        <p>
                                            <label for="url">Your Website (big input field)</label>
                                            <input class="input-big" type="text" value="" name="url" id="url"/>
                                        </p>

                                        <p>
                                            <label for="flex">Flexfield (flexible input field, width depends on window size)</label>
                                            <input class="input-flex" type="text" value="" name="flex" id="flex"/>
                                        </p>

                                        <p>
                                			<label for="date">Click into input field to choose date</label>
                                			<input class="input-small flexy_datepicker_input" type="text" value="__ / __ / ____" name="flexy_datepicker" id="date"/>
                                        </p>

                                        <p>
                                            <label for="selectbox">This is a dropdown list</label>
                                            <select name="selectbox" id="selectbox" >
                                                <option value="">Choose an option</option>
                                                <option value="1">Home</option>
                                                <option value="2">Member</option>
                                                <option value="3">Portfolio</option>
                                                <option value="4">Blog</option>
                                            </select>
                                        </p>

                                        <p>
                                            <label for="radiobutton1" class="inline">True</label>
                                            <input id="radiobutton1" name="radiobutton" type="radio" value="1" class="jquery_improved" checked="checked"/>

                                            <label for="radiobutton2" class="inline">False</label>
                                            <input id="radiobutton2" name="radiobutton" type="radio" value="2" class="jquery_improved"/>
                                        </p>

                                        <p>
                                            <label for="checkbox1" class="inline">True</label>
                                            <input type="checkbox" value="1" name="checkbox1" id="checkbox1" />
                                            <label for="checkbox2" class="inline">False</label>
                                            <input type="checkbox" value="2" name="checkbox2" id="checkbox2" />
                                        </p>

                                        <p>
                                           <label for="textarea">Enter some Text</label>
                                           <textarea name="textarea" id="textarea" cols="60" rows="15"></textarea>
                                        </p>

                                        <p>
                                           <label for="textarea2">Enter some Text into the rich text editor</label>
                                           <textarea name="textarea" id="textarea2" class="richtext" cols="60" rows="15"></textarea>
                                        </p>

                                        <p>
                                            <input class="button" name="submit" type="submit" value="Submit"/>
                                        </p>
                                    </form>

                                </div><!--end content_block-->

                            </div><!--end jquery tab-->

                            <div class="jquery_tab">

                                <div class="content_block">
                                    <h2 class="jquery_tab_title">Table Examples</h2>

                            		<table id="table_liquid" cellspacing="0">
                                    <caption>Table 3: Liquid Layout Example (always expands to maximum size)</caption>
                                      <tr>
                                        <th class="nobg">Liquid Table</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Options</th>
                                      </tr>
                                      <tr>
                                        <th class="spec">Lorem ipsum dolor</th>
                                        <td>Blog post</td>
                                        <td>latin, blind copy</td>
                                        <td>none</td>
                                      </tr>
                                      <tr>
                                        <th class="specalt">About me</th>
                                        <td class="alt">Static content</td>
                                        <td class="alt">personal, information</td>
                                        <td class="alt">none</td>
                                      </tr>
                                      <tr>
                                        <th class="spec">Portfolio</th>
                                        <td>Portfolio entry</td>
                                        <td>project, graphic, web design</td>
                                        <td>none</td>

                                      </tr>
                                      <tr>
                                        <th class="specalt">A random Blog post</th>
                                        <td class="alt">Blog post</td>
                                        <td class="alt">random, post, fun</td>
                                        <td class="alt">none</td>
                                      </tr>

                                    </table>

                                    <table id="table_auto" cellspacing="0">
                                    <caption>Table 2: Flexible Layout Example (content of tables defines the width) </caption>
                                      <tr>
                                        <th class="nobg">Flexible Table</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Options</th>
                                      </tr>
                                      <tr>
                                        <th class="spec">Lorem ipsum dolor</th>
                                        <td>Blog post</td>
                                        <td>latin, blind copy</td>
                                        <td>none</td>
                                      </tr>
                                      <tr>
                                        <th class="specalt">About me</th>
                                        <td class="alt">Static content</td>
                                        <td class="alt">personal, information</td>
                                        <td class="alt">none</td>
                                      </tr>
                                      <tr>
                                        <th class="spec">Portfolio</th>
                                        <td>Portfolio entry</td>
                                        <td>project, graphic, web design</td>
                                        <td>none</td>

                                      </tr>
                                      <tr>
                                        <th class="specalt">A random Blog post</th>
                                        <td class="alt">Blog post</td>
                                        <td class="alt">random, post, fun</td>
                                        <td class="alt">none</td>
                                      </tr>

                                    </table>

                                    <table id="table_fixed" cellspacing="0">
                                    <caption>Table 1: Fixed Layout Example </caption>
                                      <tr>
                                        <th scope="col" class="nobg">Fixed Table</th>

                                        <th scope="col">Category</th>
                                        <th scope="col">Tags</th>
                                        <th scope="col">Options</th>
                                      </tr>
                                      <tr>
                                        <th scope="row" class="spec">Lorem ipsum dolor</th>
                                        <td>Blog post</td>

                                        <td>latin, blind copy</td>
                                        <td>none</td>
                                      </tr>
                                      <tr>
                                        <th scope="row" class="specalt">About me</th>
                                        <td class="alt">Static content</td>
                                        <td class="alt">personal, information</td>

                                        <td class="alt">none</td>
                                      </tr>
                                      <tr>
                                        <th scope="row" class="spec">Portfolio</th>
                                        <td>Portfolio entry</td>
                                        <td>project, graphic, web design</td>
                                        <td>none</td>

                                      </tr>
                                      <tr>
                                        <th scope="row" class="specalt">A random Blog post</th>
                                        <td class="alt">Blog post</td>
                                        <td class="alt">random, post, fun</td>
                                        <td class="alt">none</td>
                                      </tr>

                                    </table>


                            	</div><!--end content_block-->

                            </div><!--end jquery tab-->


                            <div class="jquery_tab">

                                <div class="content_block">
                                    <h2 class="jquery_tab_title">Response Messages</h2>


                                    <div class="message success">
                                        <p><strong>Success!</strong> Everything fine...</p>
                                    </div><!-- end success -->
                                    <div class="message error">
                                        <p><strong>Error!</strong> Something is wrong...</p>
                                    </div><!-- end error  -->
                                    <div class="message warning">
                                        <p><strong>Warning!</strong> Could not connect to the server...</p>
                                    </div><!-- end warning  -->
                                    <div class="message tip">
                                        <p><strong>Tip!</strong> Buy this template =)</p>
                                    </div><!-- end tip  -->


                                    <h2>Closeable Response Messages</h2>
                                    <div class="message success closeable">
                                        <p><strong>Success!</strong> Everything fine...</p>
                                    </div><!-- end success -->
                                    <div class="message error closeable">
                                        <p><strong>Error!</strong> Something is wrong...</p>
                                    </div><!-- end error  -->
                                    <div class="message warning closeable">
                                        <p><strong>Warning!</strong> Could not connect to the server...</p>
                                    </div><!-- end warning  -->
                                    <div class="message tip closeable">
                                        <p><strong>Tip!</strong> Buy this template =)</p>
                                    </div><!-- end tip  -->


                                 </div><!--end content_block-->

                            