<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Product Listing and Receipt
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <!-- <body class="bg-[#e6e6e6] min-h-screen flex flex-col"> -->
 <body>   
  <div class="flex-grow flex flex-col md:flex-row mx-auto p-4 gap-4">

   <!-- Left side: Search, categories, products -->
   <div class="flex flex-col bg-white rounded-md p-4 flex-grow max-w-full md:max-w-[720px]">
    <!-- Search and filter top bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-4 mb-4">
     <input class="flex-grow border border-gray-200 rounded-md px-3 py-2 text-sm text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Search all contact items..." type="text"/>
     <button class="mt-2 sm:mt-0 bg-[#f37021] text-white text-sm font-semibold px-5 py-2 rounded-md hover:bg-[#d65a0a] transition-colors">
      Search
     </button>
     <button aria-label="Filter" class="ml-auto mt-2 sm:mt-0 text-gray-600 hover:text-gray-900 p-2 rounded-md">
      <i class="fas fa-sliders-h">
      </i>
     </button>
    </div>
    <!-- Categories -->
    <div class="flex flex-wrap gap-2 mb-4">
     <button class="flex items-center gap-1 bg-[#a3c1f7] text-white text-xs font-semibold rounded-md px-3 py-1">
      <i class="fas fa-trash-alt text-white text-[10px]">
      </i>
      Ice Coffee
     </button>
     <button class="flex items-center gap-1 border border-gray-300 text-xs font-semibold rounded-md px-3 py-1">
      <i class="fas fa-coffee text-gray-600 text-[10px]">
      </i>
      Hot Coffee
     </button>
     <button class="flex items-center gap-1 border border-gray-300 text-xs font-semibold rounded-md px-3 py-1">
      <i class="fas fa-leaf text-gray-600 text-[10px]">
      </i>
      Artisan Tea
     </button>
     <button class="flex items-center gap-1 border border-gray-300 text-xs font-semibold rounded-md px-3 py-1">
      <i class="fas fa-cocktail text-gray-600 text-[10px]">
      </i>
      Ice Mojito
     </button>
     <button class="flex items-center gap-1 border border-gray-300 text-xs font-semibold rounded-md px-3 py-1 truncate max-w-[5.5rem]">
      <i class="fas fa-utensils text-gray-600 text-[10px]">
      </i>
      Beverage
     </button>
     <button class="flex items-center gap-1 border border-gray-300 text-xs font-semibold rounded-md px-3 py-1 truncate max-w-[5.5rem]">
      <i class="fas fa-cookie-bite text-gray-600 text-[10px]">
      </i>
      Snacks
     </button>
    </div>
    <!-- Products grid -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
     <!-- Product 1 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Bottle of ORI GIMBER 700ml with label and cap" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/51aae9a2-cfa0-4ecb-97d8-71037f96b7b6.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight">
       ORI GIMBER 700ml
      </div>
      <div class="text-xs text-[#f37021] font-semibold mt-0.5">
       $ 24.95
      </div>
     </div>
     <!-- Product 2 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Bottle of GIMBER N°2 700 ml with label and cap" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/b2160b10-0caf-483c-5d60-f45fab3026ec.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight">
       GIMBER N°2 700 ml
      </div>
      <div class="text-xs text-[#f37021] font-semibold mt-0.5">
       $ 25.85
      </div>
     </div>
     <!-- Product 3 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Bottle of SML GIMBER 500ml with label and cap" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/0b1fe01b-56b6-467a-0bb4-53b02c0182ee.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight">
       SML GIMBER 500ml
      </div>
      <div class="text-xs text-[#b3b3b3] font-semibold mt-0.5">
       $ 20.45
      </div>
     </div>
     <!-- Product 4 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Bottle of GIMBER N°2 500 ml with label and red cap" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/441c4069-2d5c-451f-2a89-19e9510ce38c.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight">
       GIMBER N°2 500 ml
      </div>
      <div class="text-xs text-[#f37021] font-semibold mt-0.5">
       $ 26.00
      </div>
     </div>
     <!-- Product 5 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Two bottles of GIMBER duo-pack side by side with labels" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/9a9cdc9b-3676-40e6-9a00-86b96944a168.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight truncate">
       DUO-PACK: GIMBER...
      </div>
      <div class="text-xs text-[#b3b3b3] font-semibold mt-0.5">
       $ 52.80
      </div>
     </div>
     <!-- Product 6 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Small bottle of S-SML GIMBER 50ml with label" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/c890b671-2aa5-4dac-1dfe-4c7018390c0b.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight">
       S-SML GIMBER 50...
      </div>
      <div class="text-xs text-[#f37021] font-semibold mt-0.5">
       $ 20.25
      </div>
     </div>
     <!-- Product 7 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Small bottle of S-SML GIMBER with label" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/39ddb298-0191-457a-f25c-f945a49cb592.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight">
       S-SML GIMBER BR...
      </div>
      <div class="text-xs text-[#b3b3b3] font-semibold mt-0.5">
       $ 20.25
      </div>
     </div>
     <!-- Product 8 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Shop COOK &amp; GO box with bottle inside" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/5eab4154-fcd6-4834-7066-9f73c4f59970.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight truncate">
       Shop COOK &amp; GO...
      </div>
      <div class="text-xs text-[#f37021] font-semibold mt-0.5">
       $ 32.50
      </div>
     </div>
     <!-- Product 9 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="GIMBER gift box set with bottle and packaging" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/c11d9fd8-f3d8-4873-e458-cd1e2f5a43c3.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight truncate">
       GIMBER Gift Box...
      </div>
      <div class="text-xs text-[#b3b3b3] font-semibold mt-0.5">
       $ 32.50
      </div>
     </div>
     <!-- Product 10 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Bottle of GIMBER 500ml with label and cap" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/d1ee148f-697c-4924-794f-53907d329d68.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight truncate">
       GIMBER 500ml
      </div>
      <div class="text-xs text-[#b3b3b3] font-semibold mt-0.5">
       $ 20.25
      </div>
     </div>
     <!-- Product 11 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Bottle of GIMBER N°2 700ml with label and cap" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/9045825b-fd9a-4c04-0821-b5b2bc2f235a.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight truncate">
       GIMBER N°2 700ml
      </div>
      <div class="text-xs text-[#b3b3b3] font-semibold mt-0.5">
       $ 25.85
      </div>
     </div>
     <!-- Product 12 -->
     <div class="border border-gray-200 rounded-md p-2 flex flex-col items-center">
      <img alt="Bottle of GIMBER N°2 500ml with label and red cap" class="mb-1" height="100" src="https://storage.googleapis.com/a1aa/image/796b2b06-d773-4dc4-055d-4ca84328a7b3.jpg" width="80"/>
      <div class="text-xs font-semibold text-gray-700 text-center leading-tight truncate">
       GIMBER N°2 500ml
      </div>
      <div class="text-xs text-[#f37021] font-semibold mt-0.5">
       $ 26.00
      </div>
     </div>
    </div>
   </div>
   <!-- Right side: Receipt -->
   <div class="flex flex-col bg-white rounded-md p-6 w-full max-w-[400px]">
    <!-- User info and icon -->
    <div class="flex items-center gap-3 mb-6">
     <div class="flex items-center gap-2 border border-gray-300 rounded-md px-3 py-1.5 text-xs text-gray-700 font-semibold">
      <i class="fas fa-user text-gray-500">
      </i>
      Jimmy Sullivan
     </div>
     <button aria-label="Copy" class="ml-auto bg-[#7a8ca1] hover:bg-[#6a7b8f] text-white rounded-md p-2">
      <i class="fas fa-copy">
      </i>
     </button>
    </div>
    <!-- Receipt items -->
    <div class="flex flex-col gap-3 mb-6">
     <div class="flex justify-between text-sm font-semibold text-gray-900">
      <div>
       ORI GIMBER 700ml
      </div>
      <div>
       $ 24.95
      </div>
     </div>
     <div class="flex flex-col pl-3 text-xs text-gray-400">
      <div>
       • Extra Boba
       <span class="ml-auto">
        $ 2.00
       </span>
      </div>
      <div>
       • Extra Ice
       <span class="ml-auto">
        $ 3.00
       </span>
      </div>
     </div>
     <div class="flex justify-between text-sm font-semibold text-gray-900 mt-2">
      <div>
       GIMBER N°2 500 ml
      </div>
      <div>
       $ 26.00
      </div>
     </div>
     <div class="flex flex-col pl-3 text-xs text-gray-400">
      <div>
       Less Sugar
      </div>
     </div>
    </div>
    <!-- Subtotal, discount, gratuity, total -->
    <div class="flex flex-col gap-1 mb-6 text-sm">
     <div class="flex justify-between font-semibold text-gray-900">
      <div>
       Subtotal
      </div>
      <div>
       $ 53.95
      </div>
     </div>
     <div class="flex justify-between text-xs text-gray-300">
      <div>
       Discount (10%)
      </div>
      <div>
       $ 3.39
      </div>
     </div>
     <div class="flex justify-between text-xs text-gray-300 mb-1">
      <div>
       Gratuity
      </div>
      <div>
       $ 4.00
      </div>
     </div>
     <div class="flex justify-between font-bold text-gray-900 text-base">
      <div>
       Total
      </div>
      <div>
       $ 53,35
      </div>
     </div>
    </div>
    <!-- Voucher code input -->
    <input class="border-2 border-dashed border-gray-300 rounded-md px-4 py-3 mb-4 text-center text-xs text-gray-400 focus:outline-none focus:border-[#f37021]" placeholder="Add Voucher Code" type="text"/>
    <!-- Print receipt button -->
    <button class="bg-[#f37021] text-white font-semibold text-sm rounded-md py-3 hover:bg-[#d65a0a] transition-colors">
     Print Receipt
    </button>
   </div>
  </div>
  
</body>
</html>
