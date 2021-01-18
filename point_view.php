<div>
    <?php
        echo $_SESSION['session_user'];
        $memberDao= new MemberDaoImpl();
        $members=new Member();
        $members->setId($_SESSION['session_id']);
        $member=$memberDao->fetchMemberPoints($members);

        echo $member['point'].' pts';
    ?>


</div>