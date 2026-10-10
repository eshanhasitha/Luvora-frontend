<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved for Later | Luvora</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,400;6..96,500&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#f7f8fa] font-['Inter'] text-[#191c1e]">
<header class="border-b border-slate-200 bg-white"><div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-5 lg:px-8"><a href="{{ route('home') }}" class="flex items-center gap-3"><img src="{{ asset('images/logo.png') }}" alt="Luvora" class="h-10 w-auto"></a><nav class="flex items-center gap-5 text-sm"><a href="{{ route('shop.index') }}" class="text-slate-600 hover:text-blue-700">Continue shopping</a><a href="{{ route('cart.index') }}" class="font-semibold text-blue-700">Shopping bag</a></nav></div></header>
<main class="mx-auto max-w-7xl px-5 py-10 lg:px-8">
<div class="mb-8 text-sm text-slate-500"><a href="{{ route('cart.index') }}" class="hover:text-blue-700">Shopping bag</a><span class="mx-2">/</span><span class="text-slate-900">Saved for later</span></div>
<div class="mb-8"><p class="mb-2 text-xs font-semibold uppercase tracking-[0.2em] text-blue-700">Your selections</p><h1 class="font-['Bodoni_Moda'] text-4xl sm:text-5xl">Saved for later</h1><p class="mt-3 text-sm text-slate-500">Items you save in this browser will appear here.</p></div>
<section id="saved-empty" class="rounded-2xl border border-slate-200 bg-white px-6 py-16 text-center shadow-sm"><div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-slate-100 text-slate-500"><span class="material-symbols-outlined text-3xl">bookmark</span></div><h2 class="font-['Bodoni_Moda'] text-3xl">Nothing saved yet</h2><p class="mt-3 text-sm text-slate-500">When you save a cart item for later, it will be waiting here.</p><a href="{{ route('cart.index') }}" class="mt-7 inline-flex rounded-full bg-[#005baf] px-7 py-3 text-sm font-semibold text-white hover:bg-blue-800">Return to your bag</a></section>
<section id="saved-items" class="hidden"><div id="saved-grid" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3"></div></section>
</main>
<script>
const savedKey='luvora-saved-for-later';
const readSaved=()=>{try{return JSON.parse(localStorage.getItem(savedKey)||'[]')}catch{return[]}};
const escapeSaved=value=>String(value??'').replace(/[&<>"']/g,char=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[char]));
function renderSaved(){const items=readSaved();document.getElementById('saved-empty').classList.toggle('hidden',items.length>0);document.getElementById('saved-items').classList.toggle('hidden',items.length===0);document.getElementById('saved-grid').innerHTML=items.map((item,index)=>`<article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"><div class="flex gap-4 p-5"><div class="flex h-28 w-24 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-slate-100">${item.image?`<img class="h-full w-full object-cover" src="${escapeSaved(item.image)}" alt="${escapeSaved(item.name)}">`:'<span class="material-symbols-outlined text-4xl text-slate-400">checkroom</span>'}</div><div class="flex min-w-0 flex-1 flex-col"><a class="font-['Bodoni_Moda'] text-xl hover:text-blue-700" href="${escapeSaved(item.url||'/shop')}">${escapeSaved(item.name)}</a><p class="mt-2 text-sm font-semibold">LKR ${Number(item.price||0).toLocaleString('en-LK')}</p><button class="mt-auto self-start text-xs font-semibold text-red-700 hover:underline" data-remove-saved="${index}">Remove</button></div></div></article>`).join('')}
document.addEventListener('click',event=>{const button=event.target.closest('[data-remove-saved]');if(!button)return;const items=readSaved();items.splice(Number(button.dataset.removeSaved),1);localStorage.setItem(savedKey,JSON.stringify(items));renderSaved()});
renderSaved();
</script>
</body>
</html>