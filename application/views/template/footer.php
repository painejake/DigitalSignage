        
        <script src="<?php echo base_url(); ?>js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>js/main.js"></script>
        <script src="<?php echo base_url(); ?>js/vendor/jquery.cycle.all.js"></script>

        <!-- embed for BBC news -->
        <script type="text/javascript" src="http://www.bbc.co.uk/emp/swfobject.js"></script>
        <script type="text/javascript" src="http://www.bbc.co.uk/emp/embed.js"></script>
        <script type="text/javascript" src="http://www.bbc.co.uk/cs/jst/mod/1/jst_core.v1.2.js"></script>
        <script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/shCore.js"></script>
        <script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/shBrushJScript.js"></script>
        <script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/prototype.js"></script>
        <script type="text/javascript" src="http://www.bbc.co.uk/emp/simulcast/scriptaculous.js?load=effects"></script>

        <?php $s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'feed_channel' LIMIT 1");

        foreach ($s_q->result() as $row) {
           $feed_channel = $row->value;
        } ?>

        <script type="text/javascript">

            dp.SyntaxHighlighter.HighlightAll('onceCode');
            var width = 420;
            var height = 238;   
            var playlist;
            var config;   
            var revision; 

            function reload(url) {
                var emp = new embeddedMedia.Player();
                emp.setWidth(width);
                emp.setHeight(height);
                emp.setDomId("emp1");
                emp.set("config_settings_autoPlay","true");
                playlist = "http://www.bbc.co.uk/emp/simulcast/"+url+".xml";
                emp.setPlaylist(playlist);
                config = "http://www.bbc.co.uk/emp/simulcast/config_"+url+".xml";
                emp.setConfig(config);
                emp.write(); 
                updateEmbed();
            }

            function updateEmbed() {
            $('codeWrap').update('<pre name="code" class="js:nogutter" id="embedCode"></pre>');
                $('embedCode').update("var emp = new embeddedMedia.Player();"+"\n"+
                    "emp.setWidth('"+width+"');"+"\n"+
                    "emp.setHeight('"+height+"');"+"\n"+
                    "emp.setPlaylist('"+playlist+"');"+"\n"+
                    "emp.setConfig('"+config+"');"+"\n"+
                    "emp.write();");           
                dp.SyntaxHighlighter.HighlightAll('code');
            }

            reload("<?php echo $feed_channel ?>");
        </script>
    </body>
</html>
