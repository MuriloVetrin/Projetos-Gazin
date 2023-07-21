import styles from './Container.modules.css'

function Container(props) {
    return (
        <div className={`${styles.container} ${styles[props.customClass]}`}>{props.childrean}</div>
    )
}

export default Container