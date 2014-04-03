                <?php $version = $this->config->item('version'); ?>
                
                <footer>
                    <p>Page rendered in {elapsed_time} seconds</p>
                    <p><small>Script memory usage {memory_usage}</small></p>
                    <p><small><?php echo $version; ?></small></p>
                </footer>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/docs.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.dropdown.js"></script>

    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });

        function wrap_text(elementID, openTag, closeTag) {
            var textArea = $('#' + elementID);
            var len = textArea.val().length;
            var start = textArea[0].selectionStart;
            var end = textArea[0].selectionEnd;
            var selectedText = textArea.val().substring(start, end);
            var replacement = openTag + selectedText + closeTag;
            textArea.val(textArea.val().substring(0, start) + replacement + textArea.val().substring(end, len));
        }

        $('#bold').click(function() {
            wrap_text("editor", "<strong>", "</strong>");
        });
        $('#italic').click(function() {
            wrap_text("editor", "<em>", "</em>");
        });
        $('#underline').click(function() {
            wrap_text("editor", "<u>", "</u>");
        });

    </script>
    
    </body>
</html>
