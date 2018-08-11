// Override Settings
var bcSfFilterSettings = {
    general: {
        limit: bcSfFilterConfig.custom.limit_per_page,
        // Optional
        loadProductFirst: true,
        sortingList: ['manual', 'title-ascending', 'title-descending', 'price-ascending', 'price-descending', 'published-descending', 'published-ascending', 'sale-descending'],
    },
    label: {
        sorting: {
            'manual' : bcSfFilterConfig.label.sorting_featured, 
            'title-ascending': bcSfFilterConfig.label.sorting_title_ascending,
            'title-descending': bcSfFilterConfig.label.sorting_title_descending,
            'price-ascending' : bcSfFilterConfig.label.sorting_price_ascending, 
            'price-descending' : bcSfFilterConfig.label.sorting_price_descending,
            'published-descending': bcSfFilterConfig.label.sorting_date_ascending, 
            'published-ascending': bcSfFilterConfig.label.sorting_date_descending,
            'sale-descending': '% Off',
        }
    }
};

// Declare Templates
var bcSfFilterTemplate = {
    'saleLabelHtml': '<div class="sale_banner">' + bcSfFilterConfig.label.sale + '</div>',
    'vendorHtml': '<span itemprop="brand">{{itemVendorLabel}}</span>',
    'quickViewBtnHtml': '<span data-fancybox-href="#product-{{itemId}}" class="quick_shop action_button" data-gallery="product-{{itemId}}-gallery">' + bcSfFilterConfig.label.quick_shop + '</span>',
    'newRowHtml': '<br class="clear product_clear" />',

    'productGridItemHtml': '<div class="{{itemColumnNumberClass}} {{itemCollectionGroupThumbClass}} thumbnail {{itemCollectionGroupMobileClass}} itemprop="itemListElement" itemscope itemtype="http://schema.org/Product"">' +
                                '<a href="{{itemUrl}}" itemprop="url">' +
                                    '<div class="relative product_image">' +
                                        '<img src="{{itemThumbUrl}}" data-src="{{itemThumbUrl}}" data-src-retina="{{itemThumbUrl}}" alt="{{itemTitle}}" />' +
                                        '{{itemQuickViewBtn}}' +
                                    '</div>' +
                                    '<div class="info">' +
                                        '<span class="title" itemprop="name">{{itemTitle}}</span>' +
                                        '{{itemVendor}}' +
                                        '{{itemPrice}}' +
                                    '</div>' +
                                    '{{itemSaleLabel}}' +
                                    '{{itemNewLabel}}' +
                                    '{{itemComingsoonLabel}}' +
                                    '{{itemPreorderLabel}}' +
                                '</a>' +
                                '{{itemVariant}}' +
                            '</div>' +
                            '{{itemNewRow}}',

    'previousHtml': '<span class="prev"><a href="{{itemUrl}}">« ' + bcSfFilterConfig.label.paginate_prev + '</a></span>',
    'nextHtml': '<span class="next"><a href="{{itemUrl}}">' + bcSfFilterConfig.label.paginate_next + ' »</a></span>',
    'pageItemHtml': '<span class="page"><a href="{{itemUrl}}">{{itemTitle}}</a></span>',
    'pageItemSelectedHtml': '<span class="page current">{{itemTitle}}</span>',
    'pageItemRemainHtml': '<span>{{itemTitle}}</span>',
    'paginateHtml': '<div class="{{paginateWrapperClass}} columns"><div class="section clearfix"><div class="paginate">{{previous}}{{pageItems}}{{next}}</div></div>',
  
    'sortingHtml': '<label for="sort-by" class="inline">' + bcSfFilterConfig.label.sorting + '</label><select id="sort-by">{{sortingItems}}</select>'
};

// Build Product Grid Item
BCSfFilter.prototype.buildProductGridItem = function(data, index) {
    // Prepare data
    data.price_min *= 100, data.price_max *= 100, data.compare_at_price_min *= 100, data.compare_at_price_max *= 100;
    var soldOut = !data.available;
    var onSale = data.compare_at_price_max > data.price_min;
    var priceVaries = data.price_min != data.price_max;

    // Get Template
    var itemHtml = bcSfFilterTemplate.productGridItemHtml;

    var itemColumnNumberClass = '';
    var itemCollectionGroupThumbClass = buildItemCollectionGroupThumbClass(index, bcSfFilterConfig.custom.products_per_row);
    var itemCollectionGroupMobileClass = (index - 1) % 2 == 0 ? 'even' : 'odd';
    switch (bcSfFilterConfig.custom.products_per_row) {
        case '2': itemColumnNumberClass = 'eight columns'; break;
        case '3': itemColumnNumberClass = 'one-third column'; break;
        default: itemColumnNumberClass = 'four columns'; break;
    }
    itemHtml = itemHtml.replace(/{{itemColumnNumberClass}}/g, itemColumnNumberClass);    
    itemHtml = itemHtml.replace(/{{itemCollectionGroupThumbClass}}/g, itemCollectionGroupThumbClass);    
    itemHtml = itemHtml.replace(/{{itemCollectionGroupMobileClass}}/g, itemCollectionGroupMobileClass);

    // Add soldOut item
    var itemSoldOutLabel = soldOut ? bcSfFilterTemplate.soldOutLabelHtml : '';
    itemHtml = itemHtml.replace(/{{itemSoldOutLabel}}/g, itemSoldOutLabel);
  
    // Add onSale label
    var itemSaleLabel = onSale ? bcSfFilterTemplate.saleLabelHtml : '';
    itemHtml = itemHtml.replace(/{{itemSaleLabel}}/g, itemSaleLabel);

    // Add New label (New, Coming soon, Pre order)
    if (data.collections) {
        var newLabel = data.collections.filter(function(e) { return e.handle == 'new'; });
        var itemNewLabelHtml = typeof newLabel[0] != 'undefined' ? '<div class="new_banner">' + bcSfFilterConfig.label.new + '</div>' : '';
        itemHtml = itemHtml.replace(/{{itemNewLabel}}/g, itemNewLabelHtml);

        var comingsoonLabel = data.collections.filter(function(e) { return e.handle == 'coming-soon'; });
        var itemComingsoonLabelHtml = typeof comingsoonLabel[0] != 'undefined' ? '<div class="new_banner">' + bcSfFilterConfig.label.coming_soon + '</div>' : '';
        itemHtml = itemHtml.replace(/{{itemComingsoonLabel}}/g, itemComingsoonLabelHtml);

        var preorderLabel = data.collections.filter(function(e) { return e.handle == 'pre-order'; });
        var itemPreorderLabelHtml = typeof preorderLabel[0] != 'undefined' ? '<div class="new_banner">' + bcSfFilterConfig.label.pre_order + '</div>' : '';
        itemHtml = itemHtml.replace(/{{itemPreorderLabel}}/g, itemPreorderLabelHtml);        
    }

    // Add Quick view button
    var itemQuickViewBtnHtml = bcSfFilterConfig.custom.quick_shop_enable ? bcSfFilterTemplate.quickViewBtnHtml : '';
    itemHtml = itemHtml.replace(/{{itemQuickViewBtn}}/g, itemQuickViewBtnHtml);

    // Add Thumbnail
    var images = Object.keys(data.images).map(function (key) { return data.images[key]; });
    var itemThumbUrl = images.length > 0 ? this.optimizeImage(images[0]) : bcSfFilterConfig.general.no_image_url;
    itemHtml = itemHtml.replace(/{{itemThumbUrl}}/g, itemThumbUrl);

    // Add Vendor
    var itemVendorHtml = bcSfFilterConfig.custom.vendor_enable ? bcSfFilterTemplate.vendorHtml.replace(/{{itemVendorLabel}}/g, data.vendor) : '';
    itemHtml = itemHtml.replace(/{{itemVendor}}/g, itemVendorHtml);

    // Add Price
    var itemPriceHtml = '';
    var onSaleClass = onSale ? 'sale' : '';
    var soldOutClass = soldOut ? 'out_of_stock' : 'in_stock';
    itemPriceHtml += '<span class="price ' + onSaleClass + '" itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
    itemPriceHtml += '<meta itemprop="price" content="' + this.formatMoney(data.price_min, this.moneyFormat) + '" />';
    itemPriceHtml += '<meta itemprop="priceCurrency" content="' + bcSfFilterConfig.shop.currency + '" />';
    itemPriceHtml += '<meta itemprop="seller" content="' + bcSfFilterConfig.shop.name + '" />';
    itemPriceHtml += '<meta itemprop="availability" content="' + soldOutClass + '" />';
    itemPriceHtml += '<meta itemprop="itemCondition" content="New" />';
    if (!soldOut) {
        if (priceVaries && data.price_min > 0) {
            itemPriceHtml += '<small><em>' + bcSfFilterConfig.label.from_price + '</em></small> ';
        }
        if (data.price_min > 0) {
            itemPriceHtml += '<span>' + this.formatMoney(data.price_min, this.moneyFormat) + '</span>';
        } else {
            itemPriceHtml += bcSfFilterConfig.label.free_price;
        }
    } else {
        itemPriceHtml += '<span class="sold_out">' + bcSfFilterConfig.label.sold_out +'</span>';
    }
    if (onSale) {
        itemPriceHtml += ' <span class="was_price">' + this.formatMoney(data.compare_at_price_max, this.moneyFormat) + '</span>';
    }
    itemPriceHtml += '</span>';
    itemHtml = itemHtml.replace(/{{itemPrice}}/g, itemPriceHtml);

    // Add variant
    var itemVariantHtml = '';
    itemHtml = itemHtml.replace(/{{itemVariant}}/g, itemVariantHtml);

    // Add new row
    var itemNewRowHtml = index % bcSfFilterConfig.custom.products_per_row == 0 ? bcSfFilterTemplate.newRowHtml : '';
    itemHtml = itemHtml.replace(/{{itemNewRow}}/g, itemNewRowHtml);

    // Add main attribute
    itemHtml = itemHtml.replace(/{{itemTitle}}/g, data.title);
    itemHtml = itemHtml.replace(/{{itemUrl}}/g, this.buildProductItemUrl(data));

    return itemHtml;
};

// Build advanced class
function buildItemCollectionGroupThumbClass(index, productsPerRow) {
    var temp = index < productsPerRow ? index : index % productsPerRow;
    if (temp == 0) { return 'omega'; }
    else if (temp == 1) { return 'alpha'; }
    return '';
}

// Build Pagination
BCSfFilter.prototype.buildPagination = function(totalProduct) {
    // Get page info
    var currentPage = parseInt(this.queryParams.page);
    var totalPage = Math.ceil(totalProduct / this.queryParams.limit);

    // If it has only one page, clear Pagination
    if (totalPage == 1) {
        jQ(this.selector.bottomPagination).html('');
        return false;
    }

    if (this.getSettingValue('general.paginationType') == 'default') {
        var paginationHtml = bcSfFilterTemplate.paginateHtml;

        // Build wrapper
        paginationHtml = paginationHtml.replace(/{{paginateWrapperClass}}/g, 'twelve');

        // Build Previous
        var previousHtml = (currentPage > 1) ? bcSfFilterTemplate.previousHtml : '';
        previousHtml = previousHtml.replace(/{{itemUrl}}/g, this.buildToolbarLink('page', currentPage, currentPage -1));
        paginationHtml = paginationHtml.replace(/{{previous}}/g, previousHtml);

        // Build Next
        var nextHtml = (currentPage < totalPage) ? bcSfFilterTemplate.nextHtml : '';
        nextHtml = nextHtml.replace(/{{itemUrl}}/g, this.buildToolbarLink('page', currentPage, currentPage + 1));
        paginationHtml = paginationHtml.replace(/{{next}}/g, nextHtml);

        // Create page items array
        var beforeCurrentPageArr = [];
        for (var iBefore = currentPage - 1; iBefore > currentPage - 3 && iBefore > 0; iBefore--) {
            beforeCurrentPageArr.unshift(iBefore);
        }
        if (currentPage - 4 > 0) {
            beforeCurrentPageArr.unshift('...');
        }
        if (currentPage - 4 >= 0) {
            beforeCurrentPageArr.unshift(1);
        }
        beforeCurrentPageArr.push(currentPage);

        var afterCurrentPageArr = [];
        for (var iAfter = currentPage + 1; iAfter < currentPage + 3 && iAfter <= totalPage; iAfter++) {
            afterCurrentPageArr.push(iAfter);
        }
        if (currentPage + 3 < totalPage) {
            afterCurrentPageArr.push('...');
        }
        if (currentPage + 3 <= totalPage) {
            afterCurrentPageArr.push(totalPage);
        }

        // Build page items
        var pageItemsHtml = '';
        var pageArr = beforeCurrentPageArr.concat(afterCurrentPageArr);
        for (var iPage = 0; iPage < pageArr.length; iPage++) {
            if (pageArr[iPage] == '...') {
                pageItemsHtml += bcSfFilterTemplate.pageItemRemainHtml;
            } else {
                pageItemsHtml += (pageArr[iPage] == currentPage) ? bcSfFilterTemplate.pageItemSelectedHtml : bcSfFilterTemplate.pageItemHtml;
            }
            pageItemsHtml = pageItemsHtml.replace(/{{itemTitle}}/g, pageArr[iPage]);
            pageItemsHtml = pageItemsHtml.replace(/{{itemUrl}}/g, this.buildToolbarLink('page', currentPage, pageArr[iPage]));
        }
        paginationHtml = paginationHtml.replace(/{{pageItems}}/g, pageItemsHtml);

        jQ(this.selector.bottomPagination).html(paginationHtml);
    }

    jQ('#bc-sf-filter-top-pagination').html('&nbsp; / &nbsp;' + (bcSfFilterConfig.label.page).replace(/{{ current_page }}/g, this.queryParams.page).replace(/{{ pages }}/g, totalPage));
};

// Build Sorting
BCSfFilter.prototype.buildFilterSorting = function() {
    if (bcSfFilterTemplate.hasOwnProperty('sortingHtml')) {
        jQ(this.selector.topSorting).html('');

        var sortingArr = this.getSortingList();
        if (sortingArr) {
            // Build content 
            var sortingItemsHtml = '';
            for (var k in sortingArr) {
                sortingItemsHtml += '<option value="' + k +'">' + sortingArr[k] + '</option>';
            }
            var html = bcSfFilterTemplate.sortingHtml.replace(/{{sortingItems}}/g, sortingItemsHtml);
            jQ(this.selector.topSorting).html(html);

            // Set current value
            jQ(this.selector.topSorting + ' select').val(this.queryParams.sort);
        }
    }
};

// Add additional feature for product list, used commonly in customizing product list
BCSfFilter.prototype.buildExtrasProductList = function(data) {
    jQ('#bc-sf-filter-products').wrapInner('<div itemtype="http://schema.org/ItemList" class="products">');
};

// Build additional elements
BCSfFilter.prototype.buildAdditionalElements = function(data, eventType) {};