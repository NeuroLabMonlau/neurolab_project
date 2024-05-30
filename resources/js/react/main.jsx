import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'


const data = document.getElementById('react-root').getAttribute('data')

ReactDOM.createRoot(document.getElementById('react-root')).render(
  <React.StrictMode>
    <App data={data} />
  </React.StrictMode>,
)
