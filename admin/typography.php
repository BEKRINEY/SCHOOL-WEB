<?php 
	include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php 
	include 'includes/head.php';
	?>

  <body>

    <div id="wrapper">

    <?php 
	include 'includes/sidebar.php';
	?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Typograhy <small>Text and Headers</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-font"></i> Typograhy</li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Visit <a class="alert-link" target="_blank" href="http://getbootstrap.com/css/#type">Bootstrap's Typography Documentation</a> for more information.
            </div>
          </div>
          <div class="col-lg-4">
            <h1>Heading 1 <small>Sub-heading</small></h1>
            <h2>Heading 2 <small>Sub-heading</small></h2>
            <h3>Heading 3 <small>Sub-heading</small></h3>
            <h4>Heading 4 <small>Sub-heading</small></h4>
            <h5>Heading 5 <small>Sub-heading</small></h5>
            <h6>Heading 6 <small>Sub-heading</small></h6>
          </div>
          <div class="col-lg-4">
            <h1>Example Body Copy Text</h1>
            <p class="lead">This is an example of lead body copy.</p>
            <p>This is an example of standard paragraph text. This is an example of <a href="#">link anchor text</a> within body copy.</p>
            <p><small>This is an example of small, fine print text.</small></p>
            <p><strong>This is an example of strong, bold text.</strong></p>
            <p><em>This is an example of emphasized, italic text.</em></p>
            <h1>Alignment Classes</h1>
            <p class="text-left">Left aligned text.</p>
            <p class="text-center">Center aligned text.</p>
            <p class="text-right">Right aligned text.</p>
          </div>
          <div class="col-lg-4">
            <h1>Emphasis Classes</h1>
            <p class="text-muted">This is an example of muted text.</p>
            <p class="text-primary">This is an example of primary text.</p>
            <p class="text-success">This is an example of success text.</p>
            <p class="text-info">This is an example of info text.</p>
            <p class="text-warning">This is an example of warning text.</p>
            <p class="text-danger">This is an example of danger text.</p>            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <h1>Abbreviations</h1>
            <p>The abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>
            <p><abbr title="HyperText Markup Language" class="initialism">HTML</abbr> is an abbreviation for a programming language.</p>
            <h1>Addresses</h1>
            <address>
              <strong>Twitter, Inc.</strong><br>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>

            <address>
              <strong>Full Name</strong><br>
              <a href="mailto:#">first.last@example.com</a>
            </address>            
          </div>
          <div class="col-lg-4">
            <h1>Blockquotes</h1>
            <h2>Default Blockquote</h2>
            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <h2>Blockquote with Citation</h2> 
            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
            </blockquote>
            <h2>Right Aligned Blockquote</h2> 
            <blockquote class="pull-right">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
          </div>
          <div class="col-lg-4">
            <h1>Lists</h1>
            <h2>Unordered List</h2>
            <ul>
              <li>List Item</li>
              <li>List Item</li>
                <ul>
                  <li>List Item</li>
                  <li>List Item</li>
                  <li>List Item</li>
                </ul>
              <li>List Item</li>
            </ul>
            <h2>Ordered List</h2>
            <ol>
              <li>List Item</li>
              <li>List Item</li>
              <li>List Item</li>
            </ol>
            <h2>Unstyled List</h2>
            <ul class="list-unstyled">
              <li>List Item</li>
              <li>List Item</li>
              <li>List Item</li>
            </ul>
            <h2>Inline List</h2>
            <ul class="list-inline">
              <li>List Item</li>
              <li>List Item</li>
              <li>List Item</li>
            </ul>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <h1>Descriptions</h1>
            <dl>
              <dt>Standard Description List</dt>
              <dd>Description Text</dd>
              <dt>Description List Title</dt>
              <dd>Description List Text</dd>
            </dl>            
            <dl class="dl-horizontal">
              <dt>Horizontal Description List</dt>
              <dd>Description Text</dd>
              <dt>Description List Title</dt>
              <dd>Description List Text</dd>
            </dl>            
          </div>
          <div class="col-lg-4">
            <h1>Code</h1>
            <p>This is an example of an inline code element within body copy. Wrap inline code within a <code>&lt;code&gt;...&lt;/code&gt;</code> tag.</p>
            <pre>This is an example of preformatted text.</pre>
          </div>
          <div class="col-lg-4">
            <h1>Bootstrap Docs</h1>
            <p>For complete documentation, please visit <a target="_blank" href="http://getbootstrap.com/css/#type">Bootstrap's Typograhpy Documentation</a>.</p>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>