const chosen_topics = document.querySelector('.chosen');
const topic_pills = document.querySelector('.topic-pills');

document.querySelectorAll('.topic-pills span').forEach((topic) => {
    topic.addEventListener('click', function(){
        let parent = topic.parentElement;
        if(parent.classList.contains("topic-pills")){
            chosen_topics.appendChild(this);
        } else if (parent.classList.contains("chosen")){
            topic_pills.appendChild(this);
        }
    })
})