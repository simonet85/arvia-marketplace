<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Checkout - Arvía</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        />
    </head>
    <body class="bg-[#f9f8f4] min-h-screen">
        <main class="max-w-6xl mx-auto py-10 px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left: Forms -->
                <div class="lg:col-span-2 flex flex-col gap-6">
                    <!-- Contact Information -->
                    <section class="bg-white rounded-lg shadow p-6 border">
                        <h2
                            class="text-lg font-semibold mb-4 flex items-center gap-2"
                        >
                            <i class="fas fa-user"></i> Contact Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >First Name</label
                                >
                                <input
                                    type="text"
                                    class="w-full border rounded px-3 py-2"
                                    value="John"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >Last Name</label
                                >
                                <input
                                    type="text"
                                    class="w-full border rounded px-3 py-2"
                                    value="Doe"
                                />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    class="w-full border rounded px-3 py-2"
                                    value="john@example.com"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >Phone</label
                                >
                                <input
                                    type="text"
                                    class="w-full border rounded px-3 py-2"
                                    value="(555) 123-4567"
                                />
                            </div>
                        </div>
                    </section>

                    <!-- Shipping Address -->
                    <section class="bg-white rounded-lg shadow p-6 border">
                        <h2
                            class="text-lg font-semibold mb-4 flex items-center gap-2"
                        >
                            <i class="fas fa-location-dot"></i> Shipping Address
                        </h2>
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1"
                                >Street Address</label
                            >
                            <input
                                type="text"
                                class="w-full border rounded px-3 py-2"
                                value="123 Main Street"
                            />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >City</label
                                >
                                <input
                                    type="text"
                                    class="w-full border rounded px-3 py-2"
                                    value="New York"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >State</label
                                >
                                <input
                                    type="text"
                                    class="w-full border rounded px-3 py-2"
                                    value="NY"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >ZIP Code</label
                                >
                                <input
                                    type="text"
                                    class="w-full border rounded px-3 py-2"
                                    value="10001"
                                />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1"
                                >Delivery Notes (Optional)</label
                            >
                            <textarea
                                class="w-full border rounded px-3 py-2"
                                rows="2"
                                placeholder="Special delivery instructions..."
                            ></textarea>
                        </div>
                    </section>

                    <!-- Payment Method -->
                    <section class="bg-white rounded-lg shadow p-6 border">
                        <h2
                            class="text-lg font-semibold mb-4 flex items-center gap-2"
                        >
                            <i class="fas fa-credit-card"></i> Payment Method
                        </h2>
                        <div class="mb-4 flex flex-col gap-2">
                            <label
                                class="flex items-center gap-2 cursor-pointer border rounded px-3 py-2"
                            >
                                <input
                                    type="radio"
                                    name="payment"
                                    checked
                                    class="accent-[#493f35]"
                                />
                                <span class="font-medium"
                                    >Credit / Debit Card</span
                                >
                            </label>
                            <label
                                class="flex items-center gap-2 cursor-pointer border rounded px-3 py-2"
                            >
                                <input
                                    type="radio"
                                    name="payment"
                                    class="accent-[#493f35]"
                                />
                                <span class="font-medium">PayPal</span>
                            </label>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium mb-1"
                                    >Card Number</label
                                >
                                <input
                                    type="text"
                                    class="w-full border rounded px-3 py-2"
                                    value="1234 5678 9012 3456"
                                />
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <div>
                                    <label
                                        class="block text-sm font-medium mb-1"
                                        >Expiry Date</label
                                    >
                                    <input
                                        type="text"
                                        class="w-full border rounded px-3 py-2"
                                        value="MM/YY"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium mb-1"
                                        >CVV</label
                                    >
                                    <input
                                        type="text"
                                        class="w-full border rounded px-3 py-2"
                                        value="123"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium mb-1"
                                        >Cardholder Name</label
                                    >
                                    <input
                                        type="text"
                                        class="w-full border rounded px-3 py-2"
                                        value="John Doe"
                                    />
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Right: Order Summary -->
                <div>
                    <section class="bg-white rounded-lg shadow p-6 border">
                        <h2 class="text-lg font-semibold mb-4">
                            Order Summary
                        </h2>
                        <div class="divide-y">
                            <div class="flex items-center gap-3 py-3">
                                <div
                                    class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center"
                                >
                                    <img
                                        src="#"
                                        alt=""
                                        class="w-10 h-10 object-cover rounded"
                                    />
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium">
                                        Organic Face Serum
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Qty: 1
                                    </div>
                                </div>
                                <div class="font-semibold">$49.99</div>
                            </div>
                            <div class="flex items-center gap-3 py-3">
                                <div
                                    class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center"
                                >
                                    <img
                                        src="#"
                                        alt=""
                                        class="w-10 h-10 object-cover rounded"
                                    />
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium">
                                        Natural Body Lotion
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Qty: 2
                                    </div>
                                </div>
                                <div class="font-semibold">$59.98</div>
                            </div>
                        </div>
                        <div class="border-t mt-4 pt-4 space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span class="font-medium">$109.97</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span class="font-medium">$10.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Tax</span>
                                <span class="font-medium">$8.80</span>
                            </div>
                            <div
                                class="flex justify-between text-lg font-bold pt-2"
                            >
                                <span>Total</span>
                                <span>$128.77</span>
                            </div>
                        </div>
                        <ul class="mt-4 space-y-2 text-sm text-[#493f35]">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-lock text-green-500"></i>
                                Secure SSL encryption
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-truck text-green-500"></i> Free
                                shipping on orders over $75
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-undo text-green-500"></i>
                                30-day money-back guarantee
                            </li>
                        </ul>
                        <button
                            class="w-full bg-[#493f35] text-white font-semibold py-3 rounded-lg mt-6 hover:bg-[#362c22] transition"
                        >
                            Complete Order - $128.77
                        </button>
                        <button
                            class="w-full border border-[#493f35] text-[#493f35] font-semibold py-3 rounded-lg mt-3 hover:bg-[#f9f8f4] transition flex items-center justify-center gap-2"
                        >
                            <i class="fas fa-arrow-left"></i> Back to Cart
                        </button>
                        <p class="text-xs text-gray-400 text-center mt-4">
                            By completing your order, you agree to our
                            <a href="#" class="underline">Terms of Service</a>
                            and
                            <a href="#" class="underline">Privacy Policy</a>.
                        </p>
                    </section>
                </div>
            </div>
        </main>
    </body>
</html>
