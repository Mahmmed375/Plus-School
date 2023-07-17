
let select=document.getElementById("type");
let airea=document.getElementById("class");
// console.log(select);

select.onchange=()=>{


if (select.value=="رياض" ) {
airea.innerHTML=`
<option value=" " class="py-1"></option>
<option value="1" class="py-1">الفصل الدراسي الاول</option>
<option value="2" class="py-1">الفصل الدراسي الثاني</option>
<option value="3" class="py-1">الفصل الدراسي الثالث</option>
`;
}
if (select.value=="ثانوي" ) {
airea.innerHTML=`
<option value=" " class="py-1"></option>
<option value="1" class="py-1">الفصل الدراسي الاول</option>
<option value="2" class="py-1">الفصل الدراسي الثاني</option>
<option value="3" class="py-1">الفصل الدراسي الثالث</option>
`;
}
if (select.value=="اساس و متوسطة") {
airea.innerHTML=`
<option value=" " class="py-1"></option>
<option value="1" class="py-1">الفصل الدراسي الاول</option>
<option value="2" class="py-1">الفصل الدراسي الثاني</option>
<option value="3" class="py-1">الفصل الدراسي الثالث</option>
<option value="4" class="py-1">الفصل الدراسي الرابع</option>
<option value="5" class="py-1">الفصل الدراسي الخامس</option>
<option value="6" class="py-1">الفصل الدراسي السادس</option>
<option value="7" class="py-1">الفصل الدراسي الاول متوسط</option>
<option value="8" class="py-1">الفصل الدراسي الثاني متوسط</option>
<option value="9" class="py-1">الفصل الدراسي الثالث متوسط</option>
`;
}
}
