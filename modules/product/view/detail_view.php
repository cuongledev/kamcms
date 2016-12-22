<?php include DIR_MODULES . 'product/view/breacrumb.php'; ?>
<!-- BEGIN SIDEBAR & CONTENT -->
<div class="row margin-bottom-40">
  <!-- BEGIN SIDEBAR -->
  <div class="sidebar col-md-3 col-sm-5">
    <ul class="list-group margin-bottom-25 sidebar-menu">
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
      <li class="list-group-item clearfix dropdown active">
        <a href="shop-product-list.html" class="collapsed">
          <i class="fa fa-angle-right"></i>
          Mens
          
        </a>
        <ul class="dropdown-menu" style="display:block;">
          <li class="list-group-item dropdown clearfix active">
            <a href="shop-product-list.html" class="collapsed"><i class="fa fa-angle-right"></i> Shoes </a>
              <ul class="dropdown-menu" style="display:block;">
                <li class="list-group-item dropdown clearfix">
                  <a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic </a>
                  <ul class="dropdown-menu">
                    <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 1</a></li>
                    <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Classic 2</a></li>
                  </ul>
                </li>
                <li class="list-group-item dropdown clearfix active">
                  <a href="shop-product-list.html" class="collapsed"><i class="fa fa-angle-right"></i> Sport  </a>
                  <ul class="dropdown-menu" style="display:block;">
                    <li class="active"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 1</a></li>
                    <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sport 2</a></li>
                  </ul>
                </li>
              </ul>
          </li>
          <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Trainers</a></li>
          <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Jeans</a></li>
          <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Chinos</a></li>
          <li><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> T-Shirts</a></li>
        </ul>
      </li>
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Home &amp; Garden</a></li>
      <li class="list-group-item clearfix"><a href="shop-product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
    </ul>

    <div class="sidebar-products clearfix">
      <h2>Bestsellers</h2>
      <div class="item">
        <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
        <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
        <div class="price">$31.00</div>
      </div>
      <div class="item">
        <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
        <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
        <div class="price">$23.00</div>
      </div>
      <div class="item">
        <a href="shop-item.html"><img src="../../assets/frontend/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
        <h3><a href="shop-item.html">Some Shoes in Animal with Cut Out</a></h3>
        <div class="price">$86.00</div>
      </div>
    </div>
  </div>
  <!-- END SIDEBAR -->

  <!-- BEGIN CONTENT -->
  <div class="col-md-9 col-sm-7">
    <div class="product-page">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="product-main-image">
            <img src="../../assets/frontend/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="../../assets/frontend/pages/img/products/model7.jpg">
          </div>
          <div class="product-other-images">
            <a href="../../assets/frontend/pages/img/products/model3.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="../../assets/frontend/pages/img/products/model3.jpg"></a>
            <a href="../../assets/frontend/pages/img/products/model4.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="../../assets/frontend/pages/img/products/model4.jpg"></a>
            <a href="../../assets/frontend/pages/img/products/model5.jpg" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="../../assets/frontend/pages/img/products/model5.jpg"></a>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <h1><?php echo ($this->data['data_product']['name']!="") ? $this->data['data_product']['name'] : "";?></h1>
          <div class="price-availability-block clearfix">
            <div class="price">
              <?php 
              // xu ly thoi gian giá khuyen mai
                if ($this->data['sale']==true) {
                        echo "<strong><span>$</span>".number_format($this->data['data_product']['saleoff'], 0,'','.')."</strong>
                              <em>$<span>".number_format($this->data['data_product']['price'], 0,'','.')."</span></em>";
                }else{
                    echo "<strong><span>$</span>".number_format($this->data['data_product']['price'], 0,'','.')."</strong>";
                }
              ?>
              
            </div>
            <div class="availability">
              <?php echo lang('availability');?>: <strong><?php echo $this->data['name_state'];?></strong>
            </div>
          </div>
          <div class="description">
            <p><?php echo ($this->data['data_product']['short_info']!="") ? $this->data['data_product']['short_info'] : "";?></p>
          </div>
          <div class="product-page-options">
            <div class="pull-left">
              <label class="control-label">Size:</label>
              <select class="form-control input-sm">
                <option>L</option>
                <option>M</option>
                <option>XL</option>
              </select>
            </div>
            <div class="pull-left">
              <label class="control-label">Color:</label>
              <select class="form-control input-sm">
                <option>Red</option>
                <option>Blue</option>
                <option>Black</option>
              </select>
            </div>
          </div>
          <div class="product-page-cart">
            <div class="product-quantity">
                <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
            </div>
            <button class="btn btn-primary" type="submit">Add to cart</button>
          </div>
          <div class="review">
            <input type="range" value="4" step="0.25" id="backing4">
            <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
            </div>
            <a href="#">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Write a review</a>
          </div>
          <ul class="social-icons">
            <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
            <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
            <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
            <li><a class="evernote" data-original-title="evernote" href="#"></a></li>
            <li><a class="tumblr" data-original-title="tumblr" href="#"></a></li>
          </ul>
        </div>

        <div class="product-page-content">
          <ul id="myTab" class="nav nav-tabs">
            <li><a href="#Description" data-toggle="tab">Description</a></li>
            <li><a href="#Information" data-toggle="tab">Information</a></li>
            <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade" id="Description">
              <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. </p>
            </div>
            <div class="tab-pane fade" id="Information">
              <table class="datasheet">
                <tr>
                  <th colspan="2">Additional features</th>
                </tr>
                <tr>
                  <td class="datasheet-features-type">Value 1</td>
                  <td>21 cm</td>
                </tr>
                <tr>
                  <td class="datasheet-features-type">Value 2</td>
                  <td>700 gr.</td>
                </tr>
                <tr>
                  <td class="datasheet-features-type">Value 3</td>
                  <td>10 person</td>
                </tr>
                <tr>
                  <td class="datasheet-features-type">Value 4</td>
                  <td>14 cm</td>
                </tr>
                <tr>
                  <td class="datasheet-features-type">Value 5</td>
                  <td>plastic</td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade in active" id="Reviews">
              <!--<p>There are no reviews for this product.</p>-->
              <div class="review-item clearfix">
                <div class="review-item-submitted">
                  <strong>Bob</strong>
                  <em>30/12/2013 - 07:37</em>
                  <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                </div>                                              
                <div class="review-item-content">
                    <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                </div>
              </div>
              <div class="review-item clearfix">
                <div class="review-item-submitted">
                  <strong>Mary</strong>
                  <em>13/12/2013 - 17:49</em>
                  <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                </div>                                              
                <div class="review-item-content">
                    <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                </div>
              </div>

              <!-- BEGIN FORM-->
              <form action="#" class="reviews-form" role="form">
                <h2>Write a review</h2>
                <div class="form-group">
                  <label for="name">Name <span class="require">*</span></label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="review">Review <span class="require">*</span></label>
                  <textarea class="form-control" rows="8" id="review"></textarea>
                </div>
                <div class="form-group">
                  <label for="email">Rating</label>
                  <input type="range" value="4" step="0.25" id="backing5">
                  <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                  </div>
                </div>
                <div class="padding-top-20">                  
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </form>
              <!-- END FORM--> 
            </div>
          </div>
        </div>
        <?php 
        if ($this->data['sale']==true) {
            echo '<div class="sticker sticker-sale"></div>';
        }
        ?>
        
      </div>
    </div>
  </div>
  <!-- END CONTENT -->
</div>
<!-- END SIDEBAR & CONTENT -->