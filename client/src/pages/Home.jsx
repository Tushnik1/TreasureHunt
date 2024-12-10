import React, { useEffect, useState } from "react";
import { axios } from 'axios'
import { sysConfig } from "../../../config";

export const Home = ()=>{
    let [question, setQuestion] = useState(" ")
    let [incorrect, setIsIncorrect] = useState(false)
    let [answer, setAnswer] = useState('')
    useEffect(()=>{
        axios.post(sysConfig['FRONTEND']['SERVER_Q_FETCH'],{data:userId, token:token})
        .then(response=>{
            setQuestion(response.data.ques)
        })
    },[incorrect])
    const handleSubmit = (e)=>{
        e.preventDefault()
        axios.post(sysConfig['FRONTEND']['SERVER_A_SUBMIT'],{data:userId, ans:answer, token:token})
        .then(response=>{
            if(response.data.err !== null)
            setIsIncorrect(true)
            else
            setIsIncorrect(false)
        })
    }
    return (<div>
        <form action="" onSubmit={handleSubmit}>
            <p>{question}</p>
            <input type="text" onChange={e => setAnswer(e.target.value)}/>
            <button type="submit">Submit</button>
        </form>
        {incorrect && <p>Not the correct answer</p>}
        </div>
    )
}
