<div>
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            Reply this Email
        </x-slot>
        <x-slot>
            <form>
                <input type="text" name="message" class="">
                <input type="number">
            </form>
        </x-slot>
        <x-slot name="footer">
            Here is the footer
        </x-slot>
    </x-jet-dialog-modal>
</div>