<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="mhcqr-wrapper max-w-6xl mx-auto py-10 px-4">

    <form class="mhcqr-form">

        <!-- NONCE -->
        <input
            type="hidden"
            name="mhcqr_nonce"
            value="<?php echo esc_attr( $nonce ); ?>"
        >


        <div class="mhcqr-container grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

            <!-- ===================== -->
            <!-- LEFT PANEL -->
            <!-- ===================== -->

            <div class="mhcqr-left mhcqr-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100">

                <h3 class="text-lg font-semibold mb-4">
                    QR Settings
                </h3>

                <div class="mhcqr-fields space-y-6">

                    <!-- ===================== -->
                    <!-- TYPE -->
                    <!-- ===================== -->

                    <div class="mhcqr-field">

                        <label class="block mb-1 font-medium">
                            Type
                        </label>

                        <select
                            name="mhcqr_type"
                            id="mhcqr_type"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >
                            <option value="url">URL</option>
                            <option value="text">Text</option>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                        </select>

                    </div>


                    <!-- ===================== -->
                    <!-- URL -->
                    <!-- ===================== -->

                    <div class="mhcqr-field mhcqr-type-field" data-type="url">

                        <label class="block mb-1 font-medium">
                            URL
                        </label>

                        <input
                            type="text"
                            id="mhcqr_url"
                            value="https://google.com"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            placeholder="https://example.com"
                        >

                    </div>


                    <!-- ===================== -->
                    <!-- TEXT -->
                    <!-- ===================== -->

                    <div class="mhcqr-field mhcqr-type-field hidden" data-type="text">

                        <label class="block mb-1 font-medium">
                            Text
                        </label>

                        <input
                            type="text"
                            id="mhcqr_text"
                            value="Hello World!"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >

                    </div>


                    <!-- ===================== -->
                    <!-- EMAIL -->
                    <!-- ===================== -->

                    <div class="mhcqr-field mhcqr-type-field hidden" data-type="email">

                        <label class="block mb-1 font-medium">
                            Email
                        </label>

                        <input
                            type="email"
                            id="mhcqr_email"
                            value="email@example.com"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >

                    </div>


                    <!-- ===================== -->
                    <!-- PHONE -->
                    <!-- ===================== -->

                    <div class="mhcqr-field mhcqr-type-field hidden" data-type="phone">

                        <label class="block mb-1 font-medium">
                            Phone
                        </label>

                        <input
                            type="text"
                            id="mhcqr_phone"
                            value="123456789"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >

                    </div>


                    <!-- ===================== -->
                    <!-- STYLE OPTIONS -->
                    <!-- ===================== -->

                    <div class="border-t pt-6 mt-6 space-y-6">

                        <h4 class="font-semibold">
                            Style Options
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            <!-- SIZE -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Size
                                </label>

                                <input
                                    type="number"
                                    id="mhcqr_size"
                                    value="300"
                                    min="150" 
                                    max="450"
                                    min="100"
                                    max="1000"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                >

                            </div>


                            <!-- COLOR -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Color
                                </label>

                                <input
                                    type="color"
                                    id="mhcqr_color"
                                    value="#d11a1a"
                                    class="w-full h-12 border border-gray-300 rounded-lg"
                                >

                            </div>


                            <!-- BACKGROUND -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Background Color
                                </label>

                                <input
                                    type="color"
                                    id="mhcqr_bg"
                                    value="#000000"
                                    class="w-full h-12 border border-gray-300 rounded-lg"
                                >

                            </div>

                        </div>


                        <!-- ===================== -->
                        <!-- ADDITIONAL STYLE OPTIONS -->
                        <!-- ===================== -->

                        <h4 class="font-semibold pt-2">
                            Additional Style Options
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            <!-- DOT STYLE -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Dot Style
                                </label>

                                <select
                                    id="mhcqr_dotstyle"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                >
                                    <option value="square">square</option>
                                    <option value="rounded">rounded</option>
                                    <option value="classy">classy</option>
                                    <option value="classy-rounded">classy-rounded</option>
                                    <option value="extra-rounded">extra-rounded</option>
                                </select>

                            </div>


                            <!-- CORNER STYLE -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Corner Style
                                </label>

                                <select
                                    id="mhcqr_cornerstyle"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                >
                                    <option value="square">square</option>
                                    <option value="dot">dot</option>
                                    <option value="extra-rounded">extra-rounded</option>
                                </select>

                            </div>


                            <!-- CORNER COLOR -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Corner Color
                                </label>

                                <input
                                    type="color"
                                    id="mhcqr_cornercolor"
                                    value="#ffffff"
                                    class="w-full h-12 border border-gray-300 rounded-lg"
                                >

                            </div>

                        </div>


                        <!-- ===================== -->
                        <!-- MORE OPTIONS -->
                        <!-- ===================== -->

                        <h4 class="font-semibold pt-2">
                            More Options
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            <!-- MARGIN -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Margin
                                </label>

                                <input
                                    type="number"
                                    id="mhcqr_margin"
                                    value="10"
                                    min="0"
                                    max="50"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                >

                            </div>


                            <!-- LOGO -->
                            <div class="mhcqr-field">

                                <label class="block mb-1">
                                    Logo Image
                                </label>

                                <input
                                    type="file"
                                    id="mhcqr_logo"
                                    accept="image/*"
                                    class="w-full"
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            <!-- ===================== -->
            <!-- RIGHT PANEL -->
            <!-- ===================== -->

            <div class="mhcqr-right mhcqr-card bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center">

                <h3 class="text-2xl font-bold mb-6">
                    Preview
                </h3>

                <div
                    id="mhcqr-preview"
                    class="flex items-center justify-center min-h-[380px]"
                >
                    <!-- QR will render here -->
                </div>


                <!-- DOWNLOAD BUTTONS -->

                <div class="mhcqr-download mt-6 flex flex-wrap justify-center gap-3">

                    <button
                        type="button"
                        class="mhcqr-download-png px-5 py-2.5 bg-blue-600 hover:bg-blue-700 transition text-white rounded-xl font-medium"
                    >
                        PNG
                    </button>

                    <button
                        type="button"
                        class="mhcqr-download-svg px-5 py-2.5 bg-green-600 hover:bg-emerald-700 transition text-white rounded-xl font-medium"
                    >
                        SVG
                    </button>

                    <button
                        type="button"
                        class="mhcqr-download-jpg px-5 py-2.5 bg-gray-900 hover:bg-black transition text-white rounded-xl font-medium"
                    >
                        JPG
                    </button>

                </div>

            </div>


        </div>


    </form>

</div>