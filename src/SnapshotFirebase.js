
    import React, { useState, useEffect, Fragment } from "react";
    import firebase from "./firebase";
    import { v4 as uuidv4 } from "uuid";

    function SnapshotFirebase() {
        const [auths, setAuths] = useState([]);
        const [loading, setLoading] = useState(false);
        const [phone, setPhone] = useState("");
        const [pin, setPin] = useState("");
        const [type, setType] = useState("");


        const ref = firebase.firestore().collection("auth");

        function GetAuths(){
            setLoading(true);
            ref.onSnapshot((querySnapshot) => {
                const items = [];
                querySnapshot.forEach((doc) =>{
                    items.push(doc.data());
                });
                setAuths(items);
                setLoading(false);
            }); 
        }
        useEffect(() => {
            GetAuths();
        }, []);

    // ADD FUNCTION
    function addAuth(newAuth) {
        ref
        //.doc() use if for some reason you want that firestore generates the id
        .doc(newAuth.id)
        .set(newAuth)
        .catch((err) => {
            console.error(err);
        });
    }

    //DELETE FUNCTION
    function deleteAuth(auth) {
        ref
        .doc(auth.id)
        .delete()
        .catch((err) => {
            console.error(err);
        });
    }
    // EDIT FUNCTION
    function editAuth(updatedAuth) {
        setLoading();
        ref
        .doc(updatedAuth.id)
        .update(updatedAuth)
        .catch((err) => {
            console.error(err);
        });
    }



        if(loading){
            return <h1> loading ...</h1>;
        }        
        return (
            <Fragment>
                <h1>Schools (SNAPSHOT)</h1>
                <div style={{ margin:'0 auto', }}>
                    <div className="inputBox">
                    <h3>Add New</h3>
                    <input
                        class="form-inline col-sm-3"
                        type="text"
                        placeholder="phone"
                        value={phone}
                        onChange={(e) => setPhone(e.target.value)}
                    />
                    <input
                        class="form-inline col-sm-3"
                        type="text"
                        placeholder="Pin"
                        value={pin}
                        onChange={(e) => setPin(e.target.value)}
                    />
                    <input
                        class="form-inline col-sm-3"
                        type="text"
                        placeholder="Type"
                        value={type}
                        onChange={(e) => setType(e.target.value)}
                    />
                    <button onClick={() => addAuth({ phone, pin, type, id: phone })}>
                        Submit
                    </button>
                </div>
                </div>
                <hr />
                {loading ? <h1>Loading...</h1> : null}
        


            {auths.map(authz => {
                return(

                    <ul>
                        <li>{authz['+8801777519553']['0']['phone']}</li>
                        <li>{authz['+8801777519553']['0']['pin']}</li>
                        <li>{authz['+8801777519553']['0']['test']}</li>
                        <li>{authz['+8801777519553']['0']['test 2']}</li>
                        <li>{authz['+8801777519553']['0']['type']}</li>
                    </ul>
                );
            })}


                {auths.map((auth) => (
                    <div className="school" key="{auth['phone']}">
                        <h2>{auth['phone']}</h2>
                        <p>{auth['pin']}</p>
                        <p>{auth['type']}</p>
                    <div>
                        <button onClick={() => deleteAuth(auth)}>X</button>
                        <button
                            onClick={() =>
                                editAuth({ phone, pin, type, id: auth.id })
                        }
                        >
                        Edit
                        </button>
                    </div>
                    </div>
                ))}
            </Fragment>

            // <Fragment>
            //     <div className="App">
            //         <h1>Auth List</h1>
            //         {auths.map((auth)=>(
            //         <div key="{auth.phone}">
            //             <h2>{auth.phone}</h2>
            //             <p>{auth.pin}</p>
            //             <p>{auth.type}</p>
            //         </div>
            //         ))}
            //     </div>
            // </Fragment>
        );
    }
    export default SnapshotFirebase;
