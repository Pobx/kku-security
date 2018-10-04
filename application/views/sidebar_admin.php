<li id="dashboard">
	<a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
</li>

<li id="security_homes">
	<a href="<?php echo site_url('security_homes'); ?>"><i class="fa fa-home"></i> <span>โครงการฝากบ้าน</span></a>
</li>

<li id="security_cards">
	<a href="<?php echo site_url('security_cards'); ?>"><i class="fa fa-book"></i>ทะเบียนการจัดทําบัตร<br />ผ่านเข้า-ออก</a>
</li>

<li id="accidents">
	<a href="<?php echo site_url('accidents'); ?>"><i class="fa fa-warning"></i> <span>สถิติอุบัติเหตุ</span></a>
</li>

<li id="vehicles_forget_key">
	<a href="<?php echo site_url('vehicles_forget_key'); ?>"><i class="fa fa-key"></i> <span>สถิติการลืมกุญแจ</span></a>
</li>

<li id="break_motorcycle_pad">
	<a href="<?php echo site_url('break_motorcycle_pad'); ?>"><i class="fa fa-motorcycle"></i> <span>สถิติงัดเบาะรถจักยานยนต์</span></a>
</li>

<li id="break_homes">
	<a href="<?php echo site_url('break_homes'); ?>"><i class="fa fa-home"></i> <span>สถิติเหตุทรัพย์งัดที่พักอาศัย</span></a>
</li>

<!-- <li id="snatch_assets">
	<a href="<?php echo site_url('snatch_assets'); ?>"><i class="fa fa-user-secret"></i> <span>วิ่งราวชิงทรัพย์</span></a>
</li>

<li id="steal_motorcycle">
	<a href="<?php echo site_url('steal_motorcycle'); ?>"><i class="fa fa-motorcycle"></i> <span>ขโมยรถจักรยานยนต์</span></a>
</li> -->

<li id="cctv_request_log">
	<a href="<?php echo site_url('cctv_request_log'); ?>"><i class="fa fa-camera"></i> <span>สถิติขอดูภาพเหตุการณ์</span></a>
</li>

<li id="redbox">
	<a href="<?php echo site_url('redbox'); ?>"><i class="fa fa-inbox"></i> <span>สถิติกล่องแดง</span></a>
</li>

<li id="student_do_not_wear_helmet">
	<a href="<?php echo site_url('student_do_not_wear_helmet'); ?>"><i class="fa fa-motorcycle"></i> <span>สถิติไม่สวมหมวกนิรภัย</span></a>
</li>

<!-- <li>
	<a href="<?php //echo site_url('evaluation'); ?>"><i class="fa fa-book"></i> <span>แบบประเมิณ</span></a>
</li> -->

<li class="treeview" id="reports">
	<a href="#">
		<i class="fa fa-book"></i> <span>รายงาน</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>

	<ul class="treeview-menu">
		<li id="report_accidents">
			<a href="<?php echo site_url('report_accidents'); ?>"><i class="fa fa-warning"></i> <span>สถิติอุบัติเหตุ</span></a>
		</li>

		<li id="report_security_cards">
			<a href="<?php echo site_url('report_security_cards'); ?>"><i class="fa fa-book"></i>ทะเบียนการจัดทําบัตร<br />ผ่านเข้า-ออก</a>
		</li>

		<li id="report_security_home">
			<a href="<?php echo site_url('report_security_home'); ?>"><i class="fa fa-home"></i> <span>โครงการฝากบ้าน</span></a>
		</li>

		<li id="report_vehicles_forget_key">
			<a href="<?php echo site_url('report_vehicles_forget_key'); ?>"><i class="fa fa-key"></i> <span>สถิติการลืมกุญแจ</span></a>
		</li>

		<li id="report_break_homes">
			<a href="<?php echo site_url('report_break_homes'); ?>"><i class="fa fa-home"></i> <span>สถิติเหตุทรัพย์งัดที่พักอาศัย</span></a>
		</li>

		<li id="report_break_motorcycle_pad">
			<a href="<?php echo site_url('report_break_motorcycle_pad'); ?>"><i class="fa fa-motorcycle"></i> <span>สถิติงัดเบาะรถจักยานยนต์</span></a>
		</li>

		<li id="report_cctv_request_log">
			<a href="<?php echo site_url('report_cctv_request_log'); ?>"><i class="fa fa-camera"></i> <span>สถิติขอดูภาพเหตุการณ์</span></a>
		</li>

		<li id="report_redboxs">
			<a href="<?php echo site_url('report_redboxs'); ?>"><i class="fa fa-inbox"></i> <span>สถิติกล่องแดง</span></a>
		</li>

		<li id="report_do_not_wear_helmet">
			<a href="<?php echo site_url('report_do_not_wear_helmet'); ?>"><i class="fa fa-motorcycle"></i> <span>สถิติไม่สวมหมวกนิรภัย</span></a>
		</li>

		<li id="report_evaluations">
			<a href="<?php echo site_url('report_evaluations'); ?>"><i class="fa fa-book"></i> <span>แบบประเมิณ</span></a>
		</li>
	</ul>
</li>

<li class="treeview" id="setting">
	<a href="#">
		<i class="fa fa-database"></i> <span>Setting</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>

	<ul class="treeview-menu">
		<li id="users">
			<a href="<?php echo site_url('users'); ?>"><i class="fa fa-users"></i> <span>ผู้ใช้งาน</span></a>
		</li>
	</ul>
</li>
