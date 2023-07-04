function removeFromArr(arr, val){
    const index = arr.indexOf(val);
    if(index !== -1){
        arr.splice(index, 1);
    }
    return arr;
}

const chosen_topics = document.querySelector('.chosen');
const topic_pills = document.querySelector('.topic-pills');

let chosen = [];

document.querySelectorAll('.topic-pills span').forEach((topic) => {
    topic.addEventListener('click', function(){
        let parent = topic.parentElement;
        if(parent.classList.contains("topic-pills")){
            chosen_topics.appendChild(this);
            chosen.push(this.innerText);
        } else if (parent.classList.contains("chosen")){
            topic_pills.appendChild(this);
            removeFromArr(chosen, this.innerText);
        }
    })
})

const name_inp = document.getElementById('name-inp');
const name_err = document.getElementById('name-error');

const image_inp = document.getElementById('image-inp');
const img_err = document.getElementById('img-error');

const prompt_inp = document.getElementById('prompt-inp');
const prompt_err = document.getElementById('prompt-error');

document.getElementById('create-form').addEventListener('submit', function(e){
    e.preventDefault();
    let name = name_inp.value.trim();
    let img = image_inp.files[0];
    let prompt_txt = prompt_inp.value.trim();
    if(name !== '' && img !== undefined && prompt_txt !== ''){
        name_err.innerText = '';
        img_err.innerText = '';
        prompt_err.innerText = '';
        let form_data = new FormData();
        form_data.append('name', name);
        form_data.append('img', img);
        form_data.append('topics', chosen.join(','));
        form_data.append('prompt', prompt_txt);
        fetch("./create.php", {
            method: "POST",
            body: form_data,
            cache: "no-cache",
        })
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {
            if (data == '1'){
                alert('Submitted!');
                window.location = '../';
            }
            else {
                alert('An error occurred');
            }
        })
    } else {
        if(name === ''){
            name_err.innerText = 'Please add a name';
        } else {
            name_err.innerText = '';
        }
        if(img === undefined){
            img_err.innerText = 'Please add an image';
        } else {
            img_err.innerText = '';
        }
        if(prompt_txt === ''){
            prompt_err.innerText = 'Please add a prompt';
        } else {
            prompt_err.innerText = '';
        }
    }
})