<div class="max-w-md mx-auto bg-white shadow-md rounded-md overflow-hidden">
    <!-- Header -->
    <div class="bg-gray-200 px-4 py-3">
        <h2 class="text-lg font-semibold text-gray-800">Send a Public Message</h2>
    </div>

    <!-- Form -->
    <form wire:submit="sendMsg" class="px-4 py-3">
        <!-- Message Input -->
        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
            <textarea id="message" wire:model="message" name="message" rows="3" placeholder="Type your message here..." class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">
                Send
            </button>
        </div>
    </form>
</div>