let select=document.getElementById("cty");
let airea=document.getElementById("airea");
// console.log(select);

select.onchange=()=>{


if (select.value=="الشمالية") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="وادي حلفا" class="py-1">وادي حلفا</option>
<option value="دنقلا" class="py-1">دنقلا</option>
<option value="مروي" class="py-1">مروي</option>
<option value="الدبة" class="py-1">الدبة</option>
`;
}
if (select.value=="نهر النيل") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="ابو حمد" class="py-1">ابو حمد</option>
<option value="بربر" class="py-1">بربر</option>
<option value="عطبرة" class="py-1">عطبرة</option>
<option value="المتمة" class="py-1">المتمة</option>
`;
}
if (select.value=="البحر الاحمر") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="حلايب" class="py-1">حلايب</option>
<option value="بورتسودان" class="py-1">بورتسودان</option>
<option value="طوكر" class="py-1">طوكر</option>
<option value="سواكن" class="py-1">سواكن</option>
<option value="جبيت" class="py-1">جبيت</option>
<option value="هيا" class="py-1">هيا</option>
<option value="درديب" class="py-1">درديب</option>
<option value="القوليب واوليب" class="py-1">القوليب واوليب</option>
`;
}
if (select.value=="القضارف") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="الفاو" class="py-1">الفاو</option>
<option value="الفشقة" class="py-1">الفشقة</option>
<option value="بلدية القضارف" class="py-1">بلدية القضارف</option>
<option value="الرهد" class="py-1">الرهد</option>
<option value="القلابات الشرقية" class="py-1"> القلابات الشرقية</option>
<option value="القلابات الغربية" class="py-1">القلابات الغربية</option>
<option value="قلع النحل" class="py-1">قلع النحل</option>
<option value="البطانة" class="py-1">البطانة</option>
<option value="القريشة" class="py-1">القريشة</option>
`;
}
if (select.value=="كسلا") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="نهر عطبرة" class="py-1">نهر عطبرة </option>
<option value="كسلا" class="py-1">كسلا</option>
<option value="القاش" class="py-1">القاش</option>
<option value="همشكوريب" class="py-1">همشكوريب</option>
<option value="ريف كسلا" class="py-1">ريف كسلا</option>
`;
}
if (select.value=="الخرطوم") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="الخرطوم" class="py-1">الخرطوم</option>
<option value="امبدة" class="py-1">امبدة</option>
<option value="ام درمان" class="py-1">ام درمان</option>
<option value="كرري" class="py-1">كرري</option>
<option value="الخرطوم بحري" class="py-1">الخرطوم بحري</option>
<option value="شرق النيل" class="py-1">شرق النيل</option>
<option value="جبل اولياء" class="py-1">جبل اولياء</option>
`;
}
if (select.value=="الجزيرة") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="الكاملين" class="py-1">الكاملين</option>
<option value="شرق الجزيرة" class="py-1">شرق الجزيرة</option>
<option value="الحصاحيصا" class="py-1">الحصاحيصا</option>
<option value="المناقل" class="py-1">المناقل</option>
<option value="مدني الكبرى" class="py-1">مدني الكبرى</option>
<option value="جنوب الجزيرة" class="py-1">جنوب الجزيرة</option>
<option value="ام القرى" class="py-1">ام القرى</option>
`;
}
if (select.value=="سنار") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="سنار" class="py-1">سنار</option>
<option value="سنجة" class="py-1">سنجة</option>
<option value="الدندر" class="py-1">الدندر</option>
`;
}
if (select.value=="شمال كردفان") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="كلبس" class="py-1">كلبس</option>
<option value="سودري" class="py-1">سودري</option>
<option value="جبرة الشيخ" class="py-1">جبرة الشيخ</option>
<option value="بارا" class="py-1">بارا</option>
<option value="شيكان" class="py-1">شيكان</option>
<option value="ام روابة" class="py-1">ام روابة</option>
<option value="ام دم" class="py-1">ام دم</option>
`;
}
if (select.value=="النيل الابيض") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="الدويم" class="py-1">الدويم</option>
<option value="القطينة" class="py-1">الفطينة</option>
<option value="كوستي" class="py-1">كوستي</option>
<option value="الجبلين" class="py-1">الجبلين</option>
<option value="ام رمته" class="py-1">ام رمته</option>
`;
}
if (select.value=="النيل الازرق") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="الدمازين" class="py-1">الدمازين</option>
<option value="الروصيرص" class="py-1">الروصيرص</option>
<option value="قيسان" class="py-1">قيسان</option>
<option value="باو" class="py-1">باو</option>
<option value="الكرمك" class="py-1">الكرمك</option>
`;
}
if (select.value=="جنوب كردفان") {
airea.innerHTML=`
<option value="" class="py-1"></option>
<option value="الدلنج" class="py-1">الدلنج</option>
<option value="رشاد" class="py-1">رشاد</option>
<option value="ابو جبيهة" class="py-1">ابو جبيهة</option>
<option value="تلودي" class="py-1">تلودي</option>
<option value="كادقلي" class="py-1">كادقلي</option>
<option value="السلام" class="py-1">السلام</option>
<option value="القوز" class="py-1">القوز</option>
<option value="كليك" class="py-1">كليك</option>
<option value="هبيلا" class="py-1">هبيلا</option>
<option value="دلامي" class="py-1">دلامي</option>
<option value="برام" class="py-1">برام</option>
<option value="هيبان" class="py-1">هيبان</option>
<option value="ام دورين" class="py-1">ام دورين</option>
<option value="الريف الشرقي" class="py-1">الريف الشرقي</option>
<option value="العباسية" class="py-1">العباسية</option>
`;
}
if (select.value=="غرب كردفان") {
    airea.innerHTML=`
    <option value="" class="py-1"></option>
    <option value="النهود" class="py-1">النهود</option>
    <option value="بابنوسة" class="py-1">بابنوسة</option>
    <option value="الفولة" class="py-1">الفولة</option>
    <option value="هبيلا" class="py-1">هبيلا</option>
    <option value="ابيي" class="py-1">ابيي</option>
    `;
    }
    if (select.value=="جنوب دارفور") {
        airea.innerHTML=`
        <option value="" class="py-1"></option>
        <option value="برام" class="py-1">برام</option>
        <option value="كاس" class="py-1">كاس</option>
        <option value="عد الفرسان" class="py-1">عد الفرسان</option>
        <option value="نيالا" class="py-1">نيالا</option>
        <option value="تلس" class="py-1">تلس</option>
        <option value="رهيد البردي" class="py-1">رهيد البردي</option>
        <option value="كنيلا" class="py-1">كنيلا</option>
        <option value="الردوم" class="py-1">الردوم</option>
        <option value="كتم" class="py-1">كتم</option>
        <option value="ام دافوق" class="py-1">ام دافوق</option>
        <option value="شاطايا" class="py-1">شاطايا</option>
        <option value="دمسو" class="py-1">دمسو</option>
        <option value="السلام" class="py-1">السلام</option>
        <option value="قريضة" class="py-1">قريضة</option>
        <option value="شرق الجبل" class="py-1">شرق الجبل</option>
        <option value="بليل" class="py-1">بليل</option>
        <option value="الوحدة" class="py-1">الوحدة</option>
        <option value="مرشنج" class="py-1">مرشنج</option>
        <option value="السنطة" class="py-1">السنطة</option>
        <option value="نتيقا" class="py-1">نتيقا</option>
        `;
        }
        if (select.value=="غرب دارفور") {
            airea.innerHTML=`
            <option value="" class="py-1"></option>
            <option value="كلبس" class="py-1">كلبس</option>
            <option value="الجنينة" class="py-1">الجنينة</option>
            <option value="هبيلة" class="py-1">هبيلة</option>
            <option value="بيضة" class="py-1">بيضة</option>
            <option value="سربا" class="py-1">سربا</option>
            <option value="كرينك" class="py-1">كرينك</option>
            <option value="جبل مون" class="py-1">جبل مون</option>
            <option value="قوز برنقا" class="py-1">قوز برنقا</option>
            `;
            }

            if (select.value=="شمال دارفور") {
                airea.innerHTML=`
                <option value="" class="py-1"></option>
                <option value="كلبس" class="py-1">كلبس</option>
                <option value="مليط" class="py-1">مليط</option>
                <option value="كتم" class="py-1">كتم</option>
                <option value="كبكابية" class="py-1">كبكابية</option>
                <option value="الفاشر" class="py-1">الفاشر</option>
                <option value="ام كدادة" class="py-1">ام كدادة</option>
                `;
                }        if (select.value=="شرق دارفور") {
                    airea.innerHTML=`
                    <option value="" class="py-1"></option>
                    <option value="الضعين" class="py-1">الضعين</option>
                    <option value="بحر العرب" class="py-1">بحر العرب</option>
                    <option value="الفردوس" class="py-1">الفردوس</option>
                    <option value="ابو كارنكا" class="py-1">ابو كارنكا</option>
                    <option value="شعيرية" class="py-1">شعيرية</option>
                    <option value="عديلة" class="py-1">عديلة</option>
                    <option value="ابو جابرة" class="py-1">ابو جابرة</option>
                    <option value="ياسين" class="py-1">ياسين</option>
                    <option value="عسلاية" class="py-1">عسلاية</option>
                    `;
                    }
                    if (select.value=="وسط دارفور") {
                        airea.innerHTML=`
                        <option value="" class="py-1"></option>
                        <option value="زالنجي" class="py-1">زالنجي</option>
                        <option value="ازوم" class="py-1">ازوم</option>
                        <option value="وادي صالح" class="py-1">وادي صالح</option>
                        <option value="مكجر" class="py-1">مكجر</option>
                        <option value="ام دخن" class="py-1">ام دخن</option>
                        <option value="جبل مرة" class="py-1">جبل مرة</option>
                        <option value="روكورو" class="py-1">روكورو</option>
                        <option value="بندسي" class="py-1">بندسي</option>
                        `;
                        }

}
