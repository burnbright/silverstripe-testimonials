<h1 class="pagetitle">$Title</h1>
$Content
$Form
<% if Testimonials %>
	<div id="Testimonials" class="page">
		<% loop Testimonials %>
			<div id="Testimonial$ID" class="testimonial <% if Image %>image<% end_if %>">
				<% if Image %>
					<% with Image.SetWidth(112) %>
						<div class="image">	
							<img src="$URL"/>
						</div>
					<% end_with %>
				<% end_if %>
				<div class="text">
					<p>"$Content"
						<br/><span class="ref">$Name<% if Business %>, $Business<% end_if %>.</span>
					</p>
				</div>
				<div class="clear"><!--  --></div>
			</div>
		<% end_loop %>
	</div>
<% end_if %>