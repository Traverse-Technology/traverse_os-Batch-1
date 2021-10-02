productArray = [];
function addToCart(productData) {
    var duplicateItem = null;
    productData[0].qty=1;
    console.log(productArray);
    if (JSON.parse(localStorage.getItem('productData')) != null){
        productArray = JSON.parse(localStorage.getItem('productData'));
    }

    if (productArray.length > 0){
        for (let i=0; i < productArray.length; i++){
            if (productArray[i].id ==  productData[0].id){
                duplicateItem = i;
            }
        }
        if (duplicateItem != null){
            productArray[duplicateItem].qty +=1;
        }else {
            productArray.push(productData[0]);
        }
    }else {
        productArray.push(productData[0]);
    }
    localStorage.setItem('productData',JSON.stringify(productArray));
    showCount();
}
showCount();
function showCount() {
    var productData = JSON.parse(localStorage.getItem('productData'));
    if (productData!=null){
        $("#count").html(productData.length);
    }
}