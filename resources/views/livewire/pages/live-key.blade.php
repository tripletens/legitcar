<div class="flex flex-col">
    @if (session('success'))
        <div class="border-2 border-green-400 text-green-500 bg-green-200 rounded-lg p-6 mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="border-2 border-red-400 text-red-500 bg-red-200 rounded-lg p-6 mb-3">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="p-auto pb-0 text-lg mx-2">live Key</h1>

    <div class="flex flex-row p-auto space-x-3">
        <input type={{ $input_type }} readonly wire:load="fetch_live_key" wire:model="live_key" id="live_key"
            class="border-slate-400 border-2 rounded-lg h-10 m-2 bg-slate-200 w-3/4" value="{{ $live_key }}" />

        <button wire:click="toggle_type" class="m-2 p-3 rounded-full bg-slate-200 cursor-pointer">
            @if ($input_type === 'password')
                <img class="h-5" src="{{ asset('images/eye-outline.svg') }}" title="Hide" />
            @else
                <img class="h-5" src="{{ asset('images/eye-off-outline.svg') }}" title="Show" />
            @endif
        </button>

        <button onclick="copy_live_key()" class="m-2 p-3 rounded-full bg-slate-200 cursor-pointer">
            <img class="h-5" src="{{ asset('images/content-copy.svg') }}" title="Copy" />
        </button>

        <button wire:click="create_live_key" wire:confirm="Are you sure you want to renew api key?"
            class="m-2 p-3 rounded-full bg-slate-200 cursor-pointer">
            <img class="h-5" src="{{ asset('images/autorenew.svg') }}" title="Renew API key" />
        </button>

    </div>
</div>

<script>
    function copy_live_key() {
        // Get the text field
        var copyText = document.getElementById("live_key");

        // Select the text field
        copyText.select();

        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the live Apikey successfully - " + copyText.value);
    }
</script>
