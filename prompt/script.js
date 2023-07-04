const copy_btn = document.getElementById('copy-btn');

const text = document.getElementById('prompt_text').innerText;

const copyContent = async () => {
    try {
        await navigator.clipboard.writeText(text);
        copy_btn.innerText = 'Copied!';
        setTimeout(function(){
            copy_btn.innerText = 'Copy';
        }, 1500)
    } catch (err) {
        alert('Failed to copy');
    }
}